<?php
$dbuser = 'root';
$dbpass = '';
$dbname = 'githubscraperdatabase';
$dbhost = 'localhost';


try 
{
    $db = new PDO('mysql:host=' . $dbhost .';dbname=' . $dbname .';charset=utf8mb4', $dbuser, $dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 

catch (PDOException $e) 
{
    print 'Error!: ' . $e->getMessage() . '<br/>';
    die();
}
