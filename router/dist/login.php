<?php
if (isset($_SESSION['username'])) {
    header('Location: logout.php');
}
$err = "";
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'admin' && $password === 'router@123') {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        $err = "Invalid username or password";
    }
}
?>
<html>

<head>
    <title>NETGEAR WNAP123 Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"></link>
</head>

<body class="bg-white font-roboto flex flex-col items-center">
    <!-- Header -->
    <div class="w-full bg-purple-700 flex items-center justify-between px-6 py-2">
        <div class="flex items-center space-x-4">

            <span class="text-white text-2xl font-bold">NETGEAR</span>
            <span class="text-white text-sm">Connect with Innovation™</span>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#" class="text-white font-bold">Login</a>
            <a href="help.php" class="text-white font-bold">Help</a>
        </div>
    </div>
    <!-- Main Content -->
    <div class="flex-grow flex items-center justify-center w-full mt-10">
        <div class="w-96 bg-gray-100 border rounded-md p-6 shadow-lg">
            <div class="bg-gray-200 p-2 rounded-t-md text-center">
                <span class="text-gray-700 font-bold ">Login</span>
            </div>
            <form method='POST' action='login.php'>
                <div class="p-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="username" id="username" type="text" placeholder="Username">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="password" id="password" type="password" placeholder="Password">
                    </div>
                    <div class="mb-6">
                        <a class="block text-purple-700 text-sm font-bold mb-2 hover:text-purple-200" href = 'https://reurl.cc/VM6R2n'>forget password</a>
                    </div>
                    <div class="flex items-center justify-center">
                        <input
                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit" value="login" />

                    </div>

                    <div>
                        <label class="block text-red-700 text-sm font-bold mb-2 text-center	underline focus:"
                            for="username"><?php  echo $err ?></label>
                    </div> 
                </div>
              <form>
        </div>
    </div>

    <!-- Footer -->
    <div class="w-full bg-white flex items-center justify-end px-6 py-2 mt-10">
        <div class="text-right">
            <span class="text-purple-700 text-xl font-bold">WNAP123</span>
            <span class="text-gray-600 text-sm">ProSafe Wireless N Access Point</span>
        </div>
    </div>
</body>

</html>
