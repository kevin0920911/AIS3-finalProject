<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
require_once 'sess_manager.php';

function block_shell($file_type) {
    $black_list = [
        'php', 'phtml', 'php3', 'php4', 'php5', 'php7', 'phpt', 'phps', 'pht', 'phtm', 
        'shtml', 'inc', 'svg', 'htaccess', 'htpasswd', 'cgi', 'py', 'sh', 'rb', 
        'jsp', 'jspx', 'jsw', 'jsv', 'jspf', 'jtml', 'jspa', 'jss', 'jse', 
        'js', 'jsw', 'jsexe', 'jws', 'jvs', 'jvx', 'asp', 'aspx', 
        'cfm', 'cfc', 'ejs', 'erb', 'ksh', 'lua', 'sql', 'vbs', 
        'wsf', 'xqy', 'xql', 'xsd', 'xsl', 'xhtml', 'shtm', 'sht', 
        'rhtml', 'rjs', 'rpy', 'rss', 'fhtml', 'fphp', 'sjs', 'phpx', 
        'pso', 'pso1', 'pso2', 'pso3', 'wsgi', 'cgi-bin', 'cpl', 'cplog', 
        'nc', 'nsh', 'nshx', 'nxl', 'jax', 'cfg', 'log', 'conf', 'dat', 
        'bak', 'tmp', 'test', 'old', 'tar', 'gz', 'zip', 'rar', 'tar.gz', 
        'tar.bz2', 'tgz', '7z', 'dmg', 'iso', 'msi', 'deb', 'rpm', 'apk', 
        'pkg', 'sav', 'swp', 'swo', 'swn', 'suc', 'part', 'db', 'sqlite', 
        'sqlite3', 'db3', 'db4', 'dbf', 'mdb', 'accdb', 'doc', 'docx', 
        'xls', 'xlsx', 'ppt', 'pptx', 'ods', 'odt', 'pdf', 'rtf', 'tex', 
        'out', 'err', 'backup', 'dump', 'dump1', 'dump2', 'env', 'env1', 'env2'
    ];
    foreach ($black_list as $black) {
        if (stripos($file_type, $black) !== false) {
            die($black . " is not allowed.");
            return false;
        }
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $user_dir = '/tmp/' . $_SESSION['id'];
    $file = $_FILES['file'];
    $file_name = basename($file['name']);
    $file_type = $file['type'];
    $file_tmp = $file['tmp_name'];
    $file_error = $file['error'];
    $file_size = $file['size'];

    if (!block_shell($file_type)) {
        die("File type not allowed.");
    }

    $target_path = $user_dir . '/' . $file_name;

    if (move_uploaded_file($file_tmp, $target_path)) {
        echo "Image uploaded successfully! Check it out : " . "/tmp/" . $_SESSION['id'] . "/" . $file_name;
    } else {
        echo "Failed to upload file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
        }
        label {
            font-size: 1.2em;
            color: #555;
        }
        input[type="file"] {
            display: none;
        }
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            margin-top: 10px;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload a Image</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="file" class="custom-file-upload">Choose a file</label>
            <input type="file" name="file" id="file" required>
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
