<?php
session_start();
session_destroy();
header('location:Teacher_Login.php');
?>