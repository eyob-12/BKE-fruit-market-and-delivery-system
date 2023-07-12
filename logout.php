<?php
session_start();

// Unset specific session variables
unset($_SESSION['loggedin']);
unset($_SESSION['username']);

?>