<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <style>
            table { border-collapse: collapse; margin: 15px 5px;}
            td, th { border: 1px solid black; padding: 5px; text-align: center;}
        </style>
    </head>
    <body>
        <?php
        //SEQUENTIAL ARRAY ( dynamic array, index numbers start from 0 )
        // it can resize itself if new data comes in.
        
        $num = [9, 5, 2, 7, 4] ; // old way : array(9,5,2,7,4)
        $num[5] = 12 ; // dynamically add a new item 
        $num[] = 8 ; // without index number, it means add to the end. (shorthand notation)
        
        // Size of an array with count function.
        echo "<p>There are " . count($num) . " items within array.</p>";
        
        // Traversing : visiting array items one by one.
        // 1. General for loop 
        $out = "<p>General Loop: " ;
        for ( $i=0; $i<count($num); $i++) {
            // this part is where you process array items.
            // you can search, filter, calculate items.
            $out .= $num[$i]. " " ;
        }
        $out .= "</p>" ;
        echo $out;

        // 2. Using foreach statement, dedicated to array processing. 
        $out = "<p>Foreach Statement: " ;
        foreach( $num as $item) {
             $out .= $item . " " ;
         }
        $out .= "</p>" ;
        echo $out;
        
        // 3. Use built-in array functions for common tasks (do not implement
        // by yourself if the functionality is already implemented)
        echo "<p>Built-in Function: " . join(" ", $num) . "</p>";
        

         // ASSOCIATIVE ARRAY/MAP/DICTIONARY
         // to store data, key => value pairs
         // it maps a string "key" to a value (can be anything)
         $person = [ "name" => "ahmet", "id" => 12345, "cgpa" => 3.12] ;
         $person["age"] = 21 ;
         
         // Traversing an associative array, you MUST use foreach.
         foreach( $person as $k=>$v) {
             echo  "key: $k, value: $v <br>" ;
         }

        // MIXED ARRAY (nested arrays)
        $cars = [
            ["brand" => "renault", "model" => "megan", "year" => 2017],
            ["brand" => "citroen", "model" => "C3", "year" => 2015],
            ["brand" => "opel", "model" => "astra", "year" => 2011],
            ["brand" => "bmw", "model" => "3.18i", "year" => 2009]
        ] ;

        // render an html table, use a general/flexible method that displays any array.
        echo "<table>";
        // display table header using the first record's keys.
        echo "<tr>" ;
        foreach( $cars[0] as $key => $value) {
            echo "<th>". strtoupper($key) . "</th>";
        }
        echo "</tr>" ;
        
        // display data rows.
        foreach( $cars as $car) {
            echo "<tr>";
            foreach( $car as $value) {
                echo "<td>{$value}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        
        ?>
    </body>
</html>
