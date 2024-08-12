<?php

namespace Winex01\Access\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Winex01\Access\Models\Access;
use Symfony\Component\HttpFoundation\Response;
use Winex01\Access\Models\LastCheck;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve the first record or create one if it does not exist
        $lastCheck = LastCheck::first(); 

        if ($lastCheck) {

            dd(config('winex01.access.check_key_every'));

            // run or check every x duration.
            $duration = Carbon::now()->subMinutes(config('winex01.access.check_key_every'));

            if ($lastCheck->updated_at < $duration) {
                // The record's `updated_at` timestamp is older than 1 hour
                $this->checkAccess();
                // Update the existing record's updated_at timestamp
                // Note: this touch wont run if key is expired because of die in the method checkAccess
                // so anytime we add new key it will automatically run without waiting for duration.
                $lastCheck->touch();
            }

        } else {
            $this->checkAccess();

            // Create a new record with current timestamp in updated_at
            LastCheck::create();
        }

        return $next($request);
    }
    
    private function checkAccess()
    {
        $access = Access::latest()->first();

        if ($access) {
            try {
                $key = decryptWithCustomKey($access->key);
                $key = Carbon::parse($key)->startOfDay();
    
                if (Carbon::today()->gt(Carbon::parse($key)->startOfDay())) {
                    die(decryptWithCustomKey('eyJpdiI6IldIbEJSV1hOZVpXaUdubFg1M2NSNWc9PSIsInZhbHVlIjoiSWx3R09qUjRKWnpwOGs0THZ2MFRWWjZIS053cklva2ZjOFB2VmlRQlBvdG5peDYvczI1TzAwVXNzcVdZU294dVlQYmxhaWxRTGhhdFJTRzlVYi9hTmJmYWhWUGx2cURVcmRvU0IxRkNzVnJBUzZNZmlRais3S3VVdzN5ZWh4MWZnSlNQVFg1RlhPcFkyS0VNekdHZERnPT0iLCJtYWMiOiJkODZjZTViZmQxMWZhOTY3Y2RiMDI0ZjgxMGJmOGE3NzRiMWE2Mjc1OGI5OGU5ZjUyNzQyODVlZWJkZWQzNjUyIiwidGFnIjoiIn0='));
                }
            } catch (\Exception $e) {
                abort(500,
                    decryptWithCustomKey('eyJpdiI6IjJaRHRXYUdZSnBDRHlMYmxTT1FCV1E9PSIsInZhbHVlIjoicDkxQjB3TWxKYXJKNEVpZFpJclNkWmZvN0lWazVXcnE4UjdjamFwSWhHUDZLSXk3Zll2alJ1Qi8rN1V4WHNJUEtTb0t2UlFjUFNxUWl5NHdZZVdkV0E9PSIsIm1hYyI6ImI4YjM1MGZhYmRhZjRjOWJiMWNkM2I5MjlhZGUxMGM3ZDY0YWQ5NDM2MTgzNzkwNDhkMmIwMDhjN2U3NjM0NDAiLCJ0YWciOiIifQ==')
                );
            }

        }else {
            Access::create(['key' => encryptWithCustomKey(date('Y-m-d'))]);
        }
    }
}
