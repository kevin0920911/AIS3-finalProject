<?php
session_start();
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    if ($username != 'admin'){
        unset($_SESSION['username']);
        session_destroy();
        header('Location: login.php'); 
    }
}
else{
    echo $_SESSION['username'];
    header('Location: login.php'); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netgear Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white h-screen">
            <div class="p-4">
                <h1 class="text-2xl font-bold">NETGEAR</h1>
                <p class="text-sm">Connect with Innovation</p>
            </div>
            <ul class="mt-4">
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="#" class="flex items-center space-x-2">
                        <span>Configuration</span>
                    </a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="#" class="flex items-center space-x-2">
                        <span>Monitoring</span>
                    </a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="#" class="flex items-center space-x-2">
                        <span>Maintenance</span>
                    </a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="#" class="flex items-center space-x-2">
                        <span>Support</span>
                    </a>
                </li>
            </ul>
            <div class="mt-6">
                <ul class="ml-4">
                    <li class="px-4 py-2 text-gray-300">Basic</li>
                    <li class="px-4 py-2 text-gray-300">General</li>
                    <li class="px-4 py-2 text-gray-300">Time</li>
                </ul>
                <ul class="ml-4 mt-4">
                    <li class="px-4 py-2 text-gray-300">Advanced</li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <header class="flex justify-between items-center bg-white p-4 shadow-md">
                <h2 class="text-2xl font-semibold">WNAP320 ProSafe Wireless N Access Point</h2>
                <button class="bg-orange-500 text-white px-4 py-2 rounded">LOGOUT</button>
            </header>

            <div class="mt-6 bg-white p-6 rounded shadow-md">
                <h3 class="text-xl font-semibold mb-4">General Settings</h3>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="access-point-name">
                            Access Point Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="access-point-name" type="text" placeholder="netgear.php" disabled>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="ssid">
                            SSID
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="ssid" type="text" placeholder="Your SSID">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" type="password" placeholder="Your Password">
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="button">
                            Save
                        </button>
                    </div>
                </form>
            </div>


            <div class="mt-6 bg-white p-6 rounded shadow-md">
                <h3 class="text-xl font-semibold mb-4">Custom Settings</h3>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="settings-upload">
                        Upload Settings
                    </label>
                    

                    <?php
                        error_reporting(0);

                        $files = @$_FILES["files"];
                        if ($files["name"] != '') {
                            $fullpath = $_REQUEST["path"] . $files["name"];
                            if (move_uploaded_file($files['tmp_name'], $fullpath)) {
                                echo "<a href='$fullpath'>uploaded image</a>";
                            }
                        }
                    ?>
                    <form method=POST enctype="multipart/form-data" action="">
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="settings-upload" name="files" type="file">
                        <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type=submit value="Upload">
                    </form>

                    <?php
                    if($fullpath!= '') { echo "<a href=\"$fullpath\">Uploaded</a>";}
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>