<?php
include("../lib/config.php");
session_destroy();
Header("Location:../index.php");
?>