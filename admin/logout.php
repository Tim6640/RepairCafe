<?php

// Start Session if it doesn't exist
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Unset Login Variables
session_destroy();


// Redirect back to Login
header("location:index.php");

?>
