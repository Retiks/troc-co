<?php
include 'sql.php';

if (isset($_POST['username'], $_POST['password'])) {
    $db = connect_db("localhost", "root", "", "troc&co");
    createtable($db);

    if (empty($_POST['username'])) {
        echo "Le champ Pseudo est vide.";
    } elseif (!preg_match("#^[a-z0-9]+$#", $_POST['username'])) {
        echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } elseif (strlen($_POST['username']) > 25) {
        echo "Le pseudo est trop long, il dépasse 25 caractères.";
    } elseif (empty($_POST['password'])) {
        echo "Le champ Mot de passe est vide.";
    } elseif (mysqli_num_rows(mysqli_query($db, "SELECT * FROM compte WHERE username_compte='" . $_POST['username'] . "'")) == 1) { //on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
        echo "Ce pseudo est déjà utilisé.";
    } else {
        mysqli_query($db, "INSERT INTO compte SET username_compte='" . $_POST['username'] . "', password_compte='" . md5($_POST['password']) . "'");
    }
}
