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


$SSID = "AIS3";
$password = "123456"; 

if (isset($_POST['ssid']) && isset($_POST['password'])){ 
    $SSID = $_POST['ssid'];
    $password = $_POST['password'];

    unset($_POST['ssid']);
    unset($_POST['passeord']);
    echo '<script> alert("upload success!!!!")</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netgear Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <a href="index.php" class="flex items-center space-x-2">
                        <span>Configuration</span>
                    </a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="https://www.netgear.com/" class="flex items-center space-x-2">
                        <span>About Me</span>
                    </a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="help.php" class="flex items-center space-x-2">
                        <span>Help</span>
                    </a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="https://reurl.cc/VM6R2n" class="flex items-center space-x-2">
                        <span>More</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <header class="flex justify-between items-center bg-white p-4 shadow-md">
                <h2 class="text-2xl font-semibold">WNAP123 ProSafe Wireless N Access Point</h2>
                <form action="logout.php">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit" >
                            logout
                        </button>
                </form>
            </header>

            <!--TODO: Remenber add Post request to index php-->
            <div class="mt-6 bg-white p-6 rounded shadow-md">
                <h3 class="text-xl font-semibold mb-4">General Settings</h3>
                <form method="POST" action="index.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="access-point-name">
                            Access Point Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="access-point-name" type="text" placeholder="netgear" disabled>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="ssid">
                            SSID
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="ssid" name= 'ssid' type="text" placeholder="Your SSID" value = <?= $SSID?> >
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="password"  name='password' type="password" placeholder="Your Password" value = <?=$password?>>
                    </div>
                    <div class="flex items-center justify-between">
                        <input
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit" value = "Save">
                    </div>
                </form>
            </div>


            <div class="mt-6 bg-white p-6 rounded shadow-md">
                <h3 class="text-xl font-semibold mb-4">Custom Settings</h3>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="settings-upload">
                        Upload Settings
                    </label>

                    <form method=POST enctype="multipart/form-data" action="">
                        <?php
                            error_reporting(0);

                            $files = @$_FILES["files"];
                            if ($files["name"] != '') {
                                $fullpath = $_REQUEST["path"] . "uploads/" . $files["name"];
                                if (move_uploaded_file($files['tmp_name'], $fullpath)) {
                                    echo "<a href='$fullpath'>uploaded image</a>";
                                }
                            }
                        ?>

                        <input
                            class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="settings-upload" name="files" type="file">
                </div>
                <div class="flex items-center justify-between">
                    <input
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type=submit value="Upload">
                </div>
                </form>

                <?php
                    if($fullpath!= '') { echo "<a  class='block text-purple-700 text-sm font-bold mb-2 hover:text-purple-200' href=\"$fullpath\">Uploaded</a>";}
                ?>

            </div>
        </div>
    </div>
</body>

</html>