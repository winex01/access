<?php

use Illuminate\Support\Str;
use Illuminate\Encryption\Encrypter;

if (! function_exists('decryptWithCustomKey')) {
    function decryptWithCustomKey($encryptedData, $customAppKey = null) {
        if (!$customAppKey || $customAppKey == null) {
            $customAppKey = config('winex01.access.key');
        }

        // Check if the custom key starts with 'base64:' and decode it if necessary
        if (Str::startsWith($customAppKey, 'base64:')) {
            $customAppKey = base64_decode(substr($customAppKey, 7));
        }

        // Retrieve the cipher method from the config (usually AES-256-CBC)
        $cipher = config('app.cipher', 'AES-256-CBC');

        // Create a new Encrypter instance with the custom key and cipher
        $encrypter = new Encrypter($customAppKey, $cipher);

        // Decrypt the data
        return $encrypter->decrypt($encryptedData);
    }
}

if (! function_exists('decryptWithCustomKey')) {
    function encryptWithCustomKey($data, $customAppKey = null) {
        if (!$customAppKey || $customAppKey == null) {
            $customAppKey = config('winex01.access.key');
        }

        // Check if the custom key starts with 'base64:' and decode it if necessary
        if (Str::startsWith($customAppKey, 'base64:')) {
            $customAppKey = base64_decode(substr($customAppKey, 7));
        }

        // Retrieve the cipher method from the config (usually AES-256-CBC)
        $cipher = config('app.cipher', 'AES-256-CBC');

        // Create a new Encrypter instance with the custom key and cipher
        $encrypter = new Encrypter($customAppKey, $cipher);

        // Encrypt the data
        return $encrypter->encrypt($data);
    }

}