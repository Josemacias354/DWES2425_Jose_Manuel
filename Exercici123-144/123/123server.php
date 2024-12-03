<?php
/* Exercici 123: (123server.php): Mostra els valors de $_SERVER en executar un script al teu ordinador.
Prova a passar-li paràmetres per GET (i a no passar-li cap). Prepara un formulari ('123post.html')
 que faci un enviament per POST i comprovam de nou. Crea una pàgina ('123enlace.html') que tingui un enllaç a
 123server.php i comprova el valor de `HTTP_REFERER'.

*/

if (isset($_POST['nombre'])) {
    echo "El nombre es: " . $_POST['nombre'] . "<br>";
}
if (isset($_POST['apellido'])) {
    echo "El apellido es: " . $_POST['apellido'] . "<br>";
}
if (isset($_POST['edad'])) {
    echo "La edad es: " . $_POST['edad'] . "<br>";
}


if (isset($_SERVER['HTTP_REFERER'])) {
    echo "La página anterior es: " . $_SERVER['HTTP_REFERER'] . "<br>";}