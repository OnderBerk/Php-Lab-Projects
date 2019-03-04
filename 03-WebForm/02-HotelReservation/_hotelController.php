<?php

 //var_dump($_POST) ;
 extract($_POST); // $season, $type, $count, $flight, $btnReserve
 
 $base = [1000, 700] ;
 $mult = [1.5, 1.0] ;
 
 $str_season = ["Hot Season", "Normal Season"] ;
 $str_type = ["Full Board", "Half Board"] ;
 
 $price = $base[$type] * $mult[$season] ;
 $price += isset($flight) ? 150 : 0 ;
 $price *= $count;
 
 
 
 

