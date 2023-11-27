<?php


try
{
    define("host","localhost");
define("user","root");
define("password","");
define("database","cafe");



$connection= new pdo("mysql:host=".host."; dbname=".database.";",user,password);

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOexception $error)
{
    die("<script>alert('$error->getMessage()')</script>");
}

?>