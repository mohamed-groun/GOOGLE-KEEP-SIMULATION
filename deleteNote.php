<?php
session_start();
foreach ($_GET as $key) {

   unset($_SESSION['mesNotes'][$key]);
}
header("location:GOOGLE-KEEP.php");