<?php
// echo "hey you can reach me";
$conn = new mysqli('localhost', 'root', '', 'lost_and_found_hub');

$item_name = $_POST['item_name'];
$description = $_POST['description'];
$location_lost = $_POST['location_lost'];
$date_lost = $_POST['date_lost'];
$contact_info = $_POST['contact_info'];  

$image_path = '';
if (!empty($_FILES['image']['name'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $image_path = $target_file;
}


$sql = "INSERT INTO items (item_name, description, location_lost, date_lost, contact_info, image_path)
        VALUES ('$item_name', '$description', '$location_lost', '$date_lost', '$contact_info', '$image_path')";

$conn->query($sql);


$conn->close();
header("Location: index.php")
?>
