<?php
session_start();
session_destroy();
header("location:index.php?controller=user&action=login");
?>