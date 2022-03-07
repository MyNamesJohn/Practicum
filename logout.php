<?php
session_start();
session_destroy();
echo "<p>Successfuly logged out</p>";
include "index.php";
?>