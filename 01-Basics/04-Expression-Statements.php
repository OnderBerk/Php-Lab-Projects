<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <style>
            table { border-collapse: collapse; margin: auto;}
            td, th { border: 1px solid black; padding: 5px; text-align: center;}
            .divisible { color: green ;}
            .divisible:hover { background: #DDD;}
            .red { color: red;}
            .blue { color: blue;}
            p { text-align: center;}
            em { font-size: 1.5em; font-weight: bold;}
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>Number</th>
                <th>Odd/Even</th>
                <th>Divisible by 3</th>
            </tr>
        <?php
        
        // From 0 to 21, show odd/even numbers, and check if it is divisible by
        // 3. Odd is in blue color, whereas Even is red color. Use "check sign"
        // to indicate divisible numbers in green color.
        
        // At the end, show the count of numbers divisible by 3.
        
        $divisible = 0 ;
        for ( $i=0 ; $i<=21; $i++) {
            // stripe pattern
            // ternary logical statement
            $bgColor = ($i % 2 === 0) ? "#AFA" : "#FAA" ;
            
            echo "<tr style='background:{$bgColor}'>" ;
            echo "<td>{$i}</td>" ;
            if ( $i % 2 == 0 ) {
                echo "<td class='red'>Even</td>";
            } else {
                echo "<td class='blue'>Odd</td>";
            }
            
            if ( $i % 3 == 0 ) {
                $divisible++;
                echo "<td class='divisible'>\xE2\x88\x9A</td>" ;
            } else {
                echo "<td></td>" ;
            }
            echo "</tr>";
        }
        ?>
       </table>
        <?php
           echo "<p><em>{$divisible}</em> numbers are divisible by 3.</p>";
        ?>
    </body>
</html>
