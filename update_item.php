<?php
// Check if an ID is provided
if (!isset($_GET['id'])) {
    die("Item ID is required.");
}

$conn = new mysqli('localhost', 'root', '', 'lost_and_found_hub');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

// Fetch existing item details
$sql = "SELECT * FROM items WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows !== 1) {
    die("Item not found.");
}

$item = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $location_lost = $_POST['location_lost'];
    $date_lost = $_POST['date_lost'];
    $contact_info = $_POST['contact_info'];
    $found = isset($_POST['found']) ? 1 : 0;

    $image_path = $item['image_path'];
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_path = $target_file;
    }

    $update_sql = "UPDATE items SET 
                    item_name = '$item_name', 
                    description = '$description',
                    location_lost = '$location_lost',
                    date_lost = '$date_lost',
                    contact_info = '$contact_info',
                    image_path = '$image_path',
                    found = $found
                    WHERE id = $id";

    if ($conn->query($update_sql) === TRUE) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 bg-white shadow-md mt-6">
        <h2 class="text-xl font-bold mb-4">Update Item</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="item_name" class="block text-sm font-medium text-gray-700">Item Name:</label>
                <input type="text" name="item_name" id="item_name" value="<?php echo $item['item_name']; ?>" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" id="description" required class="mt-1 p-2 border border-gray-300 rounded-md w-full"><?php echo $item['description']; ?></textarea>
            </div>
            <div>
                <label for="location_lost" class="block text-sm font-medium text-gray-700">Location Lost:</label>
                <input type="text" name="location_lost" id="location_lost" value="<?php echo $item['location_lost']; ?>" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <label for="date_lost" class="block text-sm font-medium text-gray-700">Date Lost:</label>
                <input type="date" name="date_lost" id="date_lost" value="<?php echo $item['date_lost']; ?>" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <label for="contact_info" class="block text-sm font-medium text-gray-700">Contact Info:</label>
                <input type="text" name="contact_info" id="contact_info" value="<?php echo $item['contact_info']; ?>" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Upload New Image (Optional):</label>
                <input type="file" name="image" id="image" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                <p>Current Image: <a href="<?php echo $item['image_path']; ?>"><?php echo $item['image_path']; ?></a></p>
            </div>
            <div>
                <label for="found" class="block text-sm font-medium text-gray-700">Found:</label>
                <input type="checkbox" name="found" id="found" <?php echo $item['found'] ? 'checked' : ''; ?>>
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md">Update Item</button>
        </form>
    </div>
</body>
</html>
