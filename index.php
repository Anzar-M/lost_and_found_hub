<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-2xl font-bold">Lost and Found Hub</h1>
            <ul class="flex space-x-4">
                <li class="text-white bg-red-600 hover:bg-red-800 rounded-lg px-5 py-1"><a href="admin_login.php">Admin login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-6 bg-white shadow-md mt-6">
        <h2 class="text-xl font-bold mb-4">Search Lost Items</h2>
        <form method="GET" action="" class="mb-4">
            <input type="text" name="search" placeholder="Search by item name, description or location" class="p-2 border border-gray-300 rounded-md w-full">
            <button type="submit" class="mt-2 bg-blue-600 text-white py-2 px-4 rounded-md">Search</button>
        </form>

        <h2 class="text-xl font-bold mb-4">Recently Reported Items</h2>
        <table class="w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Image</th>
                    <th class="border p-2">Item Name</th>
                    <th class="border p-2">Description</th>
                    <th class="border p-2">Location Lost</th>
                    <th class="border p-2">Date Lost</th>
                    <th class="border p-2">Contact Info</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'lost_and_found_hub');

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare the SQL query
                $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
                $sql = "SELECT * FROM items WHERE found = 0";

                if (!empty($search)) {
                    $sql .= " AND (item_name LIKE '%$search%' OR description LIKE '%$search%' OR location_lost LIKE '%$search%')";
                }

                $sql .= " ORDER BY date_lost DESC LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='border px-4 py-2'><img src='" . $row['image_path'] . "' class='w-16 h-16 object-cover'><br/><a href='download_image.php?file=" . urlencode($row['image_path']) . "' class='text-white bg-blue-700 hover:bg-red-800 rounded-lg px-5 py-1'>Download</a></td>";
                        echo "<td class='border px-4 py-2'>" . $row['item_name'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['description'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['location_lost'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['date_lost'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['contact_info'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='border p-2 text-center'>No items found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
