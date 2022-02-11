<?php
session_start(); // Starting Session

if(session_destroy()) // Destroying All Sessions
{
header("Location:dashboard.html"); // Redirecting To Home Page
}
?>