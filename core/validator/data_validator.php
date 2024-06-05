<?php
class DataValidator
{
    // Validate email address
    public static function validateEmail($email)
    {
        // Remove all illegal characters from email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // Validate email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    // Validate name (alphabetic characters and spaces only)
    public static function validateName($name)
    {
        // Remove tags and trim whitespace
        $name = trim(strip_tags($name));
        // Validate name (alphabetic characters and spaces only)
        if (preg_match('/^[a-zA-Z\s]+$/', $name)) {
            return true;
        } else {
            return false;
        }
    }

    // Validate number
    public static function validateNumber($number)
    {
        // Remove non-numeric characters
        $number = preg_replace('/[^0-9]/', '', $number);
        // Check if the result is numeric
        if (is_numeric($number)) {
            return true;
        } else {
            return false;
        }
    }
    // Validate number
    public static function validatePrice($price)
    {
        // Remove non-numeric characters
        $price = preg_match('/^(\d{1,3}(,\d{3})*|\d+)(\.\d+)?$/', $price);
        // Check if the result is numeric
        if ($price) {
            return true;
        } else {
            return false;
        }
    }

    // Sanitize input (remove HTML tags, strip whitespace)
    public static function sanitizeInput($input)
    {
        return trim(strip_tags($input));
    }

    public static function sanitizeText($input)
    {
        // Define an array of allowed HTML tags
        $allowedTags = '<b><i><u><a><p><br><ul><ol><li><strong><em><h1><h2><h3><h4><h5><h6><div><span><img><table><tr><td><th><blockquote><code><pre><iframe><video><audio><hr>';
        return trim(strip_tags($input, $allowedTags));
    }

    // Validate URL
    public static function validateURL($url)
    {
        // Remove all illegal characters from the URL
        $url = filter_var($url, FILTER_SANITIZE_URL);
        // Validate URL
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            return false;
        }
    }

    // Validate mobile number
    public static function validateMobileNumber($mobile)
    {
        // Remove non-numeric characters
        $mobile = preg_replace('/[^0-9]/', '', $mobile);
        // Validate mobile number (must be exactly 10 digits)
        if (strlen($mobile) === 10) {
            return true;
        } else {
            return false;
        }
    }


    // Validate password strength
    public static function validatePasswordStrength($password)
    {
        // Minimum password length
        $minLength = 8;

        // Check if password meets minimum length requirement
        if (strlen($password) < $minLength) {
            return false;
        }

        // Check if password contains at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        // Check if password contains at least one lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }

        // Check if password contains at least one digit
        if (!preg_match('/\d/', $password)) {
            return false;
        }

        // Check if password contains at least one special character
        if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
            return false;
        }

        // Password meets all criteria
        return true;
    }
}
