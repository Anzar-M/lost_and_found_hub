<?php
echo "trying connection";
$conn = new mysqli('localhost', 'root', '', 'lost_and_found_hub');
$id = $_GET['id'];

echo "connection made";
try {
echo "deleting";
$conn->query("DELETE FROM items WHERE id = '$id'");
}
catch(Exception $e){
    echo 'error: '  .$e->getMessage();
}
header("Location: admin_dashboard.php");
exit();
?>