<?php
// Server-Side Validation
// $g_serial, $g_maxPrice will be tested if they are valid or not.

$error = [] ;  // initially, assume that there is no error

$priceOption = ["options" => ["min_range" => 1]] ;

if (!empty($g_serial) ) {
    if (!checkSerial($g_serial)) {
        $error[] = "PHP: Invalid Serial No";
    }
} else if ( strlen($g_maxPrice) !== 0 && 
        filter_var($g_maxPrice, FILTER_VALIDATE_INT, $priceOption ) === false){
        $error[] = "PHP: Invalid Price";
}

// pattern matching for CCDDDD-DD
function checkSerial($s) {
  if ( strlen($s) !== 9) return false;
  if ( ctype_upper($s[0]) && ctype_upper($s[1]) &&
       ctype_digit($s[2]) && ctype_digit($s[3]) &&
       ctype_digit($s[4]) && ctype_digit($s[5]) &&
       $s[6] === "-" &&
       ctype_digit($s[7]) && ctype_digit($s[8]) ) {
         return true;
       }
   return false ;
}



