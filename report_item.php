<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Lost Item</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-2xl font-bold">Lost and Found Hub</h1>
            <ul class="flex space-x-4">
                <li><a href="index.php" class="text-white">Home</a></li>
                <li><a href="report_item.php" class="text-white">Report lost item</a></li>
                <li class="text-white bg-red-700 hover:bg-red-800 rounded-lg px-5 py-1"><a href="admin_login.php">Admin login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-6 bg-white shadow-md mt-6">
        <h2 class="text-xl font-bold mb-4">Report Lost Item</h2>
        <form action="submit_report.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="item_name" class="block text-sm font-medium text-gray-700">Item Name:</label>
                <input type="text" name="item_name" id="item_name" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" id="description" required class="mt-1 p-2 border border-gray-300 rounded-md w-full"></textarea>
            </div>
            <div>
                <label for="location_lost" class="block text-sm font-medium text-gray-700">Location Lost:</label>
                <input type="text" name="location_lost" id="location_lost" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <label for="date_lost" class="block text-sm font-medium text-gray-700">Date Lost:</label>
                <input type="date" name="date_lost" id="date_lost" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <label for="contact_info" class="block text-sm font-medium text-gray-700">Contact Info:</label>
                <input type="text" name="contact_info" id="contact_info" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image:</label>
                <input type="file" name="image" id="image" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md">Submit</button>
        </form>
    </div>
</body>

</html>
