<!DOCTYPE html>
<html>

<head>
    <title>NETGEAR WNAP320 Help</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="bg-white font-roboto flex flex-col items-center">
    <!-- Header -->
    <div class="w-full bg-purple-700 flex items-center justify-between px-6 py-2">
        <div class="flex items-center space-x-4">
            <span class="text-white text-2xl font-bold">NETGEAR</span>
            <span class="text-white text-sm">Connect with Innovation™</span>
        </div>
        <div class="flex items-center space-x-4">
            <a href="login.php" class="text-white font-bold">Login</a>
            <a href="help.php" class="text-white font-bold">Help</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow flex items-center justify-center w-full mt-10">
        <div class="w-96 bg-gray-100 border rounded-md p-6 shadow-lg">
            <div class="bg-gray-200 p-2 rounded-t-md">
                <span class="text-gray-700 font-bold">Help</span>
            </div>
            <div class="p-4">
                <div class="mb-4">
                    <button onclick="toggleSection('passwordIssues')" class="w-full text-left text-gray-700 text-lg font-bold mb-2 focus:outline-none">
                        Password Issues
                    </button>
                    <div id="passwordIssues" class="hidden">
                        <p class="text-gray-700 text-sm mb-2">If you have forgotten your password, you can reset it by clicking on the "Forgot Password" link on the login page. Follow the instructions to reset your password.</p>
                        <p class="text-gray-700 text-sm mb-2">Make sure your new password meets the following criteria:</p>
                        <ul class="list-disc pl-6 text-gray-700 text-sm mb-2">
                            <li>At least 8 characters long</li>
                            <li>Contains both uppercase and lowercase letters</li>
                            <li>Includes at least one numeric digit</li>
                            <li>Has at least one special character (e.g., !@#$%^&*)</li>
                        </ul>
                    </div>
                </div>
                <div class="mb-4">
                    <button onclick="toggleSection('accountIssues')" class="w-full text-left text-gray-700 text-lg font-bold mb-2 focus:outline-none">
                        Account Issues
                    </button>
                    <div id="accountIssues" class="hidden">
                        <p class="text-gray-700 text-sm mb-2">If you are having trouble accessing your account, please ensure that your username and password are entered correctly. Usernames and passwords are case-sensitive.</p>
                        <p class="text-gray-700 text-sm mb-2">The default username and password for the NETGEAR WNAP320 are:</p>
                        <ul class="list-disc pl-6 text-gray-700 text-sm mb-2">
                            <li>Username: admin</li>
                            <li>Password: admin</li>
                        </ul>
                        <p class="text-gray-700 text-sm mb-2">If you continue to experience issues, please contact our support team for further assistance. You can reach us at:</p>
                        <ul class="list-disc pl-6 text-gray-700 text-sm mb-2">
                            <li>Phone: 1-800-NETGEAR</li>
                            <li>Email: support@netgear.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="w-full bg-white flex items-center justify-end px-6 py-2 mt-10">
        <div class="text-right">
            <span class="text-purple-700 text-xl font-bold">WNAP320</span>
            <span class="text-gray-600 text-sm">ProSafe Wireless N Access Point</span>
        </div>
    </div>

    <script>
        function toggleSection(id) {
            var element = document.getElementById(id);
            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
            } else {
                element.classList.add('hidden');
            }
        }
    </script>
</body>

</html>