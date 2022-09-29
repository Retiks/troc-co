<?php

function connect_db($db_host, $db_username, $db_password, $db_name)
{
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Could not Connect to Database');
    return $db;
}

function createtable($db) {
    $requeteTable = "CREATE TABLE IF NOT EXISTS compte (id int AUTO_INCREMENT PRIMARY KEY, nom_compte VARCHAR(50), prenom_compte VARCHAR(50), username_compte VARCHAR(50), password_compte VARCHAR(50), date_naiss DATE, mail_compte VARCHAR(50), numTel_compte CHAR(10), staff BOOLEAN)";
    mysqli_query($db, $requeteTable);
}
