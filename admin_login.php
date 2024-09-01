<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'anzar' && $password === 'anzar') {
        header("Location: admin_dashboard.php");
    } else {
        echo "Invalid login credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4">Admin Login</h1>
        <form method="POST" action="">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md">Sign In</button>
        </form>
    </div>
</body>

</html>