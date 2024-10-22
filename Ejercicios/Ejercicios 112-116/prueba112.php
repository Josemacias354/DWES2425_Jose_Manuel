<?php
require_once 'exercici112Empleat.php';

    $empleat1 = new Empleat('Pere', 'Martínez', 4000);
    echo $empleat1->getNomComplet() . '<br>';
    echo $empleat1->hadePagarImpostos() ? 'Sí' : 'No' ;
    echo '<br>';

    $empleat2 = new Empleat('Anna', 'Garcia', 3000);
    echo $empleat2->getNomComplet() . '<br>';
    echo  $empleat2->hadePagarImpostos() ? 'Sí' : 'No';