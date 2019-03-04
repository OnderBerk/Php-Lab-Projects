<?php

const MAX_PRICE = 100000 ;
function searchByID(&$cars, $id) {
       foreach( $cars as $car) {
          if ( $car["serialNo"] === $id) {
              return [$car];
          } 
       }
       return [] ;
   }
   
   
function searchByMake(&$cars, $make,  $price)  {
    $found = [] ;
    foreach( $cars as $car) {
        if ( strtoupper($car["make"]) === $make && $car["price"] <= $price  ) {
            $found[] = $car ;
        } 
    }
    return $found ;
}

function allMake(&$cars) {
    $make = [];
    foreach( $cars as $car) {
        $upperCase = strtoupper($car["make"]);
        if ( !in_array( $upperCase, $make)) {
            $make[] = $upperCase;
        }
    }
    sort($make);
    return $make;
}
