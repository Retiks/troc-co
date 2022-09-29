<?php
include 'sql.php';
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $db = connect_db("localhost", "root", "", "troc&co");
    createtable($db);

    $requeteUser = "SELECT count(*) FROM compte WHERE username_compte LIKE '" . $_POST['username'] . "' AND password_compte LIKE '" . $_POST['password'] . "'";
    $exec_requeteUser = mysqli_query($db, $exec_requeteUser);
    $reponseUser = mysqli_fetch_array($exec_requeteUser);
    $countUser = $reponseUser['count(*)'];

    if ($_POST['username'] != "" && $_POST['password'] != "") {
        switch ($countUser) {
            case 0:
                header('Location: login.php');
                break;

            default:
                header('Location : accueil.php');
                $_SESSION['tokenAcces'] = 1;
                break;
        }
    } else {
        header('Location: login.php');
    }
}

mysqli_close($db);
