<?php

// Generate a unique ID
function generateUniqueId()
{
    // Get current timestamp in microseconds
    $timestamp = microtime(true);

    // Generate a random number (4 digits)
    $random = mt_rand(1000, 9999);

    // Combine timestamp and random number
    $uniqueId = $timestamp . $random;

    return $uniqueId;
}

// Generate token
function generateToken($length = 200)
{
    return bin2hex(random_bytes($length / 2));
}
