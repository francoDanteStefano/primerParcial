<?php

/* INCLUYO CLASES */
include "Responsable.php";
include "Viaje.php";
include "Empresa.php";
include "Terminal.php";

/* CREO OBJETOS */

/* Responsables */
$objResponsable1 = new Responsable("Joseph", "Smith", 123456, "Los alerces 123","js@gmail.com", 5551234);
$objResponsable2 = new Responsable("Brad", "Smith", 123457, "Los alerces 123","bs@gmail.com", 5551235);
$objResponsable3 = new Responsable("Angelina", "Smith", 123458, "Los alerces 123","as@gmail.com", 5551236);
$objResponsable4 = new Responsable("Jonhy", "Smith", 123459, "Los alerces 123","jons@gmail.com", 5551237);
/* Viajes */
$viaje1 = new Viaje2 ("Puerto Rico","15", "23", 1, "150", "10/05/22", 400, 350, $objResponsable1);
$viaje2 = new Viaje2 ("Cuba","15", "23", 2, "250", "11/05/22", 400, 350, $objResponsable2);
$viaje3 = new Viaje2 ("Rep. Dominicana","15", "23", 3, "250", "12/05/22", 400, 350, $objResponsable3);
$viaje4 = new Viaje2 ("Mexico","15", "23", 4, "350", "13/05/22", 400, 350, $objResponsable4);
/* Empresas */
$empresa1 = new Empresa2 (1, "Seabourn Cruise Line",[$viaje1, $viaje2]);
$empresa2 = new Empresa2 (2, "Princess Cruises",[$viaje3, $viaje4]);
/* Terminal */
$terminal = new Terminal ("Puerto Vallarta", "Calle falsa 123", [$empresa1, $empresa2]);

echo $terminal->ventaAutomatica(3, "10/05/22", "Puerto Rico", 1);

echo $terminal->empresaMayorRecaudacion();

echo $terminal->responsableViaje(2);
?>