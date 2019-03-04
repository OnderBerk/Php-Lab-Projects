<?php
function searchByID($id)  {
       global $cars ;
       foreach( $cars as $car) {
          if ( $car["serialNo"] === $id) {
              return [$car];
          } 
       }
       return [] ;
}
function searchByMake( $make,  $price)  {
    global $cars ;
    $found = [] ;
    foreach( $cars as $car) {
        if ( strtoupper($car["make"]) === $make && $car["price"] <= $price  ) {
            $found[] = $car ;
        } 
    }
    return $found ;
}
function allMake() {
    global $cars;
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
