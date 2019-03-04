<?php
  if ( isset($_POST["btnSearch"])) {
     // 1. Get input
    extract($_POST,EXTR_PREFIX_ALL, "g") ;

    // search based on serial
    $g_maxPrice = !empty($g_maxPrice) ? $g_maxPrice : MAX_PRICE;


    if ( !empty($g_serial)) {
        $result = searchByID($cars, $g_serial) ;
    } else {
        $result = searchByMake($cars,$g_make, $g_maxPrice) ;
    }   
 }

  // Prepare output for view component
 $g_make = isset($g_make) ? $g_make : "" ;  // $g_make ?? "";
 $g_maxPrice = isset($g_maxPrice) && $g_maxPrice !== MAX_PRICE ? $g_maxPrice : "" ;
 $g_serial = isset($g_serial) ? $g_serial : "";
 $allMakers = allMake($cars);
    
// Output to View are
//  $result: search result
//  $cars: all car data
//  $g_serial, $g_make, $g_maxPrice , $allMakers