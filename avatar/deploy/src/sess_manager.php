<?php
session_start();

function create_user_image_dir() {
    if (!isset($_SESSION['id'])) {
        $_SESSION['id'] = bin2hex(random_bytes(16));
    }

    $user_dir = '/tmp/' . $_SESSION['id'];
    if (!file_exists($user_dir)) {
        if (!mkdir($user_dir, 0777, true)) {
            die('Failed to create user directory.');
        }
    }

    return $_SESSION['id'];
}

$user_id = create_user_image_dir();
