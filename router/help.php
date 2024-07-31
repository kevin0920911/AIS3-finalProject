<?php 
session_start();
$is_login = isset($_SESSION['username']);
?>
<!DOCTYPE html>
<html>

<head>
    <title>NETGEAR WNAP123 Help</title>
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
            <?php
                if (!$is_login){
                    echo '<a href="login.php" class="text-white font-bold">Login</a>';
                }
            ?>
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
                    <button onclick="toggleSection('about')" class="w-full text-left text-gray-700 text-lg font-bold mb-2 focus:outline-none">
                       About
                    </button>
                    
                    <div id="about" class="hidden">
                        <hr class="border-gray-300 my-1">
                        <p class="text-gray-700 text-sm mb-2">The NETGEAR WNAP123 is a high-performance wireless access point designed to provide reliable and secure network connectivity. Ideal for small to medium-sized businesses, it supports advanced features such as multiple SSIDs, VLAN tagging, and robust security protocols.</p>
                        <p class="text-gray-700 text-sm mb-2">With its user-friendly web interface, you can easily manage and configure the device to meet your networking needs. The WNAP320 is built to ensure seamless wireless coverage and high-speed connectivity, making it a reliable choice for enhancing your network infrastructure.</p>
                    </div>
                </div>
                <div class="mb-4">
                    <button onclick="toggleSection('requirement')" class="w-full text-left text-gray-700 text-lg font-bold mb-2 focus:outline-none">
                        System Requirements
                    </button>
                    
                    <div id="requirement" class="hidden">
                        <hr class="border-gray-300 my-1">
                        <ul class="list-disc pl-6 text-gray-700 text-sm mb-2">
                            <li>Compatible web browser (e.g., Chrome, Firefox, Safari, Edge)</li>
                            <li>Network connection (Ethernet or Wireless)</li>
                            <li>Administrator access to network settings</li>
                            <li>For initial setup, a PC or laptop with an Ethernet port is recommended</li>
                        </ul>
                    </div>
                </div>
                <div class="mb-4">
                    <button onclick="toggleSection('passwordIssues')" class="w-full text-left text-gray-700 text-lg font-bold mb-2 focus:outline-none">
                        Password Issues
                    </button>
                    
                    <div id="passwordIssues" class="hidden">
                        <hr class="border-gray-300 my-1">
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
                        <hr class="border-gray-300 my-1">
                        <p class="text-gray-700 text-sm mb-2">If you are having trouble accessing your account, please ensure that your username and password are entered correctly. Usernames and passwords are case-sensitive.</p>
                        <p class="text-gray-700 text-sm mb-2">The default username and password for the NETGEAR WNAP123 are:</p>
                        <ul class="list-disc pl-6 text-gray-700 text-sm mb-2">
                            <li>Username: admin</li>
                            <li>Password: router@123</li>
                        </ul>
                        <p class="text-gray-700 text-sm mb-2">If you continue to experience issues, please contact our support team for further assistance. You can reach us at:</p>
                        <ul class="list-disc pl-6 text-gray-700 text-sm mb-2">
                            <li>Phone: 1-000-999999</li>
                            <li>Email: support@fakemail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="w-full bg-white flex items-center justify-end px-6 py-2 mt-10">
        <div class="text-right">
            <span class="text-purple-700 text-xl font-bold">WNAP123</span>
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