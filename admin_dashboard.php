<?php
$conn = new mysqli('localhost', 'root', '', 'lost_and_found_hub');
$result = $conn->query("SELECT * FROM items WHERE found = 0 ORDER BY date_lost DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-2xl font-bold">Lost and Found Hub - Admin</h1>
            <a href="admin_login.php" class="text-white">Sign Out</a>
        </div>
    </nav>

    <div class="container mx-auto p-6 bg-white shadow-md mt-6">
        <h2 class="text-xl font-bold mb-4">Reported Items</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Image</th>
                    <th class="px-4 py-2 border">Item Name</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Location Lost</th>
                    <th class="px-4 py-2 border">Date Lost</th>
                    <th class="px-4 py-2 border">Contact Info</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='border px-4 py-2'><img src='" . $row['image_path'] . "' class='w-16 h-16 object-cover'></td>";
                        echo "<td class='border px-4 py-2'>" . $row['item_name'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['description'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['location_lost'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['date_lost'] . "</td>";
                        echo "<td class='border px-4 py-2'>" . $row['contact_info'] . "</td>";
                        echo "<td class='border px-4 py-2'><a href='delete_item.php?id=" . $row['id'] . "' class='text-red-600'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center p-4'>No items reported lost yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
$conn->close();