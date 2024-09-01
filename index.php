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
                <li><a href="index.php" class="text-white">Home</a></li>
                <li><a href="report_item.php" class="text-white">Report lost item</a></li>
                <!--FIXME:This button is copied from online and is not aligned with the rest of list -->
                <li class="text-white bg-red-700 hover:bg-red-800 rounded-lg px-5 py-1"><a href="admin_login.php">Admin login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-6 bg-white shadow-md mt-6">
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

                $sql = "SELECT * FROM items WHERE found = 0 ORDER BY date_lost DESC LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='bg-gray-50'>";
                        if ($row['image_path']) {
                            echo "<td class='border p-2'><a href='" . $row['image_path'] . "' target='_blank'><img src='" . $row['image_path'] . "' alt='" . $row['item_name'] . "' class='w-24 h-24 object-cover'></a></td>";
                        } else {
                            echo "<td class='border p-2'>No Image</td>";
                        }
                        echo "<td class='border p-2'>" . $row['item_name'] . "</td>";
                        echo "<td class='border p-2'>" . $row['description'] . "</td>";
                        echo "<td class='border p-2'>" . $row['location_lost'] . "</td>";
                        echo "<td class='border p-2'>" . $row['date_lost'] . "</td>";
                        echo "<td class='border p-2'>" . $row['contact_info'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='border p-2 text-center'>No items reported lost yet.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>