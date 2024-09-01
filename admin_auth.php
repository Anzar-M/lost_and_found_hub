<?php
if ($_POST['username'] === 'admin' && $_POST['password'] === 'password') {
    header('Location: admin_dashboard.php');
} else {
    header('Location: admin_login.php');
}
?>

