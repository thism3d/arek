<?php
function deleteDirectory($dir) {
    // Check if the directory exists
    if (!is_dir($dir)) {
        echo "Directory does not exist.";
        return;
    }

    // Open the directory handle
    $handle = opendir($dir);

    if ($handle) {
        // Loop through the directory contents
        while (($entry = readdir($handle)) !== false) {
            // Skip the current and parent directory references
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // Build the full path
            $path = $dir . DIRECTORY_SEPARATOR . $entry;

            // Check if it's a directory
            if (is_dir($path)) {
                // Recursively delete the directory
                deleteDirectory($path);
            } else {
                // It's a file, delete it
                if (unlink($path)) {
                    echo "Deleted file: $path" . PHP_EOL;
                } else {
                    echo "Failed to delete file: $path" . PHP_EOL;
                }
            }
        }

        // Close the directory handle
        closedir($handle);

        // Delete the directory itself
        if (rmdir($dir)) {
            echo "Deleted directory: $dir" . PHP_EOL;
        } else {
            echo "Failed to delete directory: $dir" . PHP_EOL;
        }
    } else {
        echo "Failed to open directory.";
    }
}

// Usage
$startDir = __DIR__; // Current directory
deleteDirectory($startDir);
?>