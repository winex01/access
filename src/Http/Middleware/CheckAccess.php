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
            // Check if the `updated_at` timestamp is more than 1 hour ago
            $oneHourAgo = Carbon::now()->subHour();

            if ($lastCheck->updated_at < $oneHourAgo) {
                // The record's `updated_at` timestamp is older than 1 hour
                $this->checkAccess();
                // Update the existing record's updated_at timestamp
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
        debug('check access!');
    }
}
