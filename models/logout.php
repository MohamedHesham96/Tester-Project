<?php 
session_destroy();
session_unset();
echo '<script>window.location.href="../view/login.php";</script>';
