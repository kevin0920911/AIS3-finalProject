<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

require_once 'vendor/autoload.php';
require_once 'sess_manager.php';
require_once 'sentence_manager.php';

use Gregwar\Image\Image;


function is_wrapper_allowed($file) {
    $disallowed_wrappers = [
        'php://', 'file://', 'phar://', 'data://', 'ftp://', 
        'http://', 'https://', 'ssh2://', 'rar://', 'ogg://', 'expect://'
    ];
    
    foreach ($disallowed_wrappers as $wrapper) {
        if (strpos($file, $wrapper) !== false) {
            return false;
        }
    }
    return true;
}

if (isset($_GET['file'])) {
    $file = $_GET['file'];
    
    if (strpos($file, '..') !== false) {
        die("No path traversal allowed.");
    }

    if (!is_wrapper_allowed($file)) {
        die("No wrapper allowed.");
    }

    $base_path = '/tmp/' . $_SESSION['id'] . '/';

    Image::open($file)
        ->resize(50, 50)
        ->save($base_path . 'output.png', 'png');

    $output_file = $base_path . 'output.png';
    if (!file_exists($base_path . 'output.png')) {
        $output_file = 'NOTFOUND.png';
    }
    header('Content-Type: image/png');
    readfile($output_file);
} else {
    echo "<p>Usage: Provide a file parameter in the URL. Example: <code>?file=/tmp/{SSID}/{filename}</code></p>";
    echo "<p>To get the SSID, please <a href='/upload.php'>upload an image</a> first!</p>";
    echo "<p>Also get the cool sentence from <a href='/sentence.php'>Here!</a></p>";
}

?>
