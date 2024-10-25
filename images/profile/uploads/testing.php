<?php
// Function to get the list of files and directories in a directory
function getDirectoryContents($dir) {
    $contents = scandir($dir);
    $files = array();
    $directories = array();

    foreach ($contents as $item) {
        if ($item != '.' && $item != '..') {
            if (is_dir($dir.'/'.$item)) {
                $directories[] = $item;
            } else {
                $files[] = $item;
            }
        }
    }

    return array('files' => $files, 'directories' => $directories);
}

// Function to display the directory contents
function displayDirectoryContents($dir) {
    $contents = getDirectoryContents($dir);
    $files = $contents['files'];
    $directories = $contents['directories'];

    echo '<ul>';

    // Display directories
    foreach ($directories as $directory) {
        echo '<li><strong>' . $directory . '/</strong> <a href="?dir=' . urlencode($dir.'/'.$directory) . '">Open</a></li>';
    }

    // Display files
    foreach ($files as $file) {
        echo '<li>' . $file . ' <a href="?download=' . urlencode($dir.'/'.$file) . '">Download</a> <a href="?delete=' . urlencode($dir.'/'.$file) . '" onclick="return confirm(\'Are you sure you want to delete this file?\')">Delete</a>';
        // Add link to read file content if it's a text file
        $filePath = $dir.'/'.$file;
        if (is_readable($filePath) && is_text_file($filePath)) {
            echo ' <a href="?read=' . urlencode($filePath) . '">Read</a>';
        }
        echo '</li>';
    }

    echo '</ul>';
}

// Function to check if a file is a text file
function is_text_file($file) {
    $mime = mime_content_type($file);
    return substr($mime, 0, 4) == 'text';
}

// Function to display file content
function displayFileContent($filePath) {
    $content = file_get_contents($filePath);
    echo '<h2>File Content</h2>';
    echo '<pre>' . htmlspecialchars($content) . '</pre>';
}

// Handle file downloads
if (isset($_GET['download'])) {
    $filepath = $_GET['download'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        readfile($filepath);
        exit;
    } else {
        echo 'File not found.';
    }
}

// Handle file deletions
if (isset($_GET['delete'])) {
    $filepath = $_GET['delete'];
    if (file_exists($filepath)) {
        if (is_dir($filepath)) {
            rmdir($filepath);
        } else {
            unlink($filepath);
        }
        echo 'File or directory deleted successfully.';
    } else {
        echo 'File or directory does not exist.';
    }
}

// Handle file content reading
if (isset($_GET['read'])) {
    $filePath = $_GET['read'];
    if (is_readable($filePath) && is_text_file($filePath)) {
        displayFileContent($filePath);
    } else {
        echo 'Unable to read file content.';
    }
}

// Determine current directory
$rootDir = realpath('.');
$dir = isset($_GET['dir']) ? realpath($_GET['dir']) : $rootDir;

// Display file manager
echo '<h2>File Manager</h2>';
echo '<p>Current Directory: ' . $dir . '</p>';

// Display directory contents
displayDirectoryContents($dir);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple File Manager</title>
</head>
<body>

    <h2>Upload File</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Upload">
    </form>

</body>
</html>
