<!--
ETML
Auteur      : Anthony Höhn
Date        : 04.03.2021
Description : tkt
-->
<?php
require "lib/db.class.php";
require "like.class.php";
require "dbconfig.cfg";
$DB = new DB (Config::$host, Config::$username, Config::$password, Config::$database);
$like = new like ();
?>