<?php
  
  // multi-byte (UTF-8) string processing.
  $name = "Çağıl" ;
  echo "Length for '$name' with strlen " . strlen($name), "</br>"; // returns 8 which is the number of bytes, not characters.
  echo "Length for '$name' with mb_strlen " . mb_strlen($name), "</br>"; // returns the length for UTF-8 encoded string.

  // Concatanation
  $name .= " Alsancak" ;
  
  // Accessing
  $firstLetter = $name[0]; // not working, because it returns the first byte not character.
  echo "First letter of '$name' is $firstLetter (not working with [0])" , "<br>";
  
  $firstLetter = mb_substr($name,0,1);  // string, index, 1
  echo "First letter of '$name' is $firstLetter" , "<br>";
  
  // Copy a part of the string
  $lastname = mb_substr($name, 6) ;
  echo "Copy characters after index 6 to the end : $lastname", "<br>";
  
  $text = "Introduction to PHP coding" ;
  // Uppercase and Lowercase
  echo "Uppercase : " . mb_strtoupper($text) . " and Lowercase : " . mb_strtolower($text) , "<br>" ;
  // Each words' first letter is capital
  echo "MB Case Title : " . mb_convert_case($text, MB_CASE_TITLE) . "<br>" ;
  
  // Search
  $pos = mb_strpos($name, "ğ") ;
  if ( $pos !== FALSE ) {
     echo "Search 'ğ' in '$name' : index position : $pos", "<br>";
  }
  
  $pos = mb_strpos($name, "la") ;
  if ( $pos !== FALSE) {
    echo "Search 'la' in '$name' : index position : $pos", "<br>";
  } else {
      echo "Search 'la' in '$name' : not found", "<br>";
  }
  
  // mb_stripos is case insensitive version of mb_strpos
  
  
  
  
  