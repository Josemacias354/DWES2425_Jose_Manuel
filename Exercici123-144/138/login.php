<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
}


if ($username == 'admin' && $password == 'admin') {
    header('Location: mainAdmin.php');
    exit();
} elseif ($username == 'usuari' && $password == 'usuari') {
    header('Location: main.php');
    exit();
} else {
    echo "<script>alert('Invalid username or password');</script>";
    header('Refresh: 0.1; URL=index.php');
    exit();
}
