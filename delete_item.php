
Copy code
<?php
$conn = new mysqli('localhost', 'root', '', 'lost_and_found_hub');
$id = $_GET['id'];

$conn->query("DELETE FROM items WHERE id = '$id'");

header("Location: admin_dashboard.php");
exit();
?>
