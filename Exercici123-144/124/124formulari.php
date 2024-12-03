<?php

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $mail = $_POST['mail'];
    $url = $_POST['url'];
    $sexo = $_POST['sexo'];
    $convivents = $_POST['convivents'];
    $acficions = $_POST['aficions'];
    $menu = $_POST['menu'];

    echo "Nombre: $nombre <br>";
    echo "Mail: $mail <br>";
    echo "Url: $url <br>";
    echo "Sexo: $sexo <br>";
    echo "Convivents: $convivents <br>";
    echo "Aficiones: $aficions <br>";
    echo "Menu: $menu <br>";
}




