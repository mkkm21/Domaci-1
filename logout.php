<?php
session_start();
session_destroy();
header("location:index.php?logout=true");
exit;
?>