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

function findItemById(array $array, string $id, string $val) {
    
    foreach ($array as $key => $value) {
        // print_r($array);
        // print_r($value);
        echo "(key: $key, value: $value, id: $id, val: $val)<br>";
        if ($key == $id && $value == $val) {
            // echo ".....<br><br><br> value = $value";
            return $value;
        }
    }
    return null; // Return null if item with specified ID is not found
}


function arrayToString($array = [])
{
    $v = '';
    for ($i = 0; $i < count($array); $i++) {
        $v .= $array[$i] . '@';
    }
    return $v;
}

function uploadFile($file, $allowedTypes = array('image/jpeg', 'image/png'), $uploadDir = 'uploads/')
{
    // Check if file was uploaded without errors
    if ($file['error'] == UPLOAD_ERR_OK) {
        // Check if file type is allowed
        if (in_array($file['type'], $allowedTypes)) {
            // Generate unique filename
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = uniqid('uuid_') . '.' . $extension;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {

                return [
                    'success' => true,
                    'message' => 'Upload successful',
                    'file' => $filename,
                ];
            } else {
                return [
                    'success' => false,
                    'message' => "Error uploading file.",
                    'url' => null,
                ];
            }
        } else {
            return [
                'success' => false,
                'message' => "Invalid file type.",
                'url' => null,
            ];
        }
    } else {
        return [
            'success' => false,
            'message' => "Error: " . $file['error'],
            'url' => null,
        ];
    }
}
function uploadMultipleFiles($files, $allowedTypes = array('image/jpeg', 'image/png'), $uploadDir = 'uploads/') {
    $uploadResults = array();
    $uploadedFiles = array(); // Array to store uploaded file names

    foreach ($files['tmp_name'] as $key => $tmp_name) {
        $file = array(
            'name' => $files['name'][$key],
            'type' => $files['type'][$key],
            'tmp_name' => $files['tmp_name'][$key],
            'error' => $files['error'][$key],
            'size' => $files['size'][$key]
        );

        // Check if file was uploaded without errors
        if ($file['error'] == UPLOAD_ERR_OK) {
            // Check if file type is allowed
            if (in_array($file['type'], $allowedTypes)) {
                // Generate unique filename
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = uniqid('uuid_') . '.' . $extension;

                // Move the uploaded file to the specified directory
                if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
                    $uploadResults[] = array(
                        'success' => true,
                        'message' => 'Upload successful',
                        'file' => $filename
                    );
                    $uploadedFiles[] = $filename; // Add filename to the uploaded files array
                } else {
                    $uploadResults[] = array(
                        'success' => false,
                        'message' => "Error uploading file: {$file['name']}",
                        'file' => null
                    );
                }
            } else {
                $uploadResults[] = array(
                    'success' => false,
                    'message' => "Invalid file type: {$file['name']}",
                    'file' => null
                );
            }
        } else {
            $uploadResults[] = array(
                'success' => false,
                'message' => "Error uploading file: {$file['name']} - Error: {$file['error']}",
                'file' => null
            );
        }
    }

    return array(
        'success' => true,
        'message' => null,
        'uploadResults' => $uploadResults,
        'uploadedFiles' => $uploadedFiles
    );
}
