<?php

session_start();
$_SESSION['connection'] = 0;
session_unset();
session_destroy();

echo '<script>window.location="login.php#login"</script>';
?>

