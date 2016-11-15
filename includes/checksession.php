<?php
include ("../lib/config.php");
if(!isset($_SESSION["userid"]) && empty($_SESSION["userid"]))
{
    header("Location:../index.php");
}
?>