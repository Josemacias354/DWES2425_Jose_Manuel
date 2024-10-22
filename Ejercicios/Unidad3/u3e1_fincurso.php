<?php
$hoy = new DateTime("2024-10-21");
$finCurso = new DateTime('2024-06-24');
$diferencia = $hoy->diff($finCurso);
echo "Quedan " . $diferencia->days . " días hasta el final del curso.";
