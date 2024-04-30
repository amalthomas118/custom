<?php 

/**
 * Template Name: Error Page
 * 
 **/
?>


<?php

// Start session
session_start();

// Retrieve the error result from the session
$error_result = isset($_SESSION['error_result']) ? $_SESSION['error_result'] : '';

// Display the error result
echo 'Error Result: ' . $error_result;

var_dump($error_result);

// Clear the session variable
unset($_SESSION['error_result']);






?>