<?php
session_start();
session_destroy();
header('location:insert.php');

?>