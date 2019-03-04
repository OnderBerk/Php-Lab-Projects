<?php
   require "carsDB.php" ;
   require "util.php";
   
   const MAX_PRICE=100000 ;
   
   if ( isset($_POST["submit"])) {
       // 1. Get input
       extract($_POST,EXTR_PREFIX_ALL, "g") ;
       
       // search based on serial
       $g_maxPrice = !empty($g_maxPrice) ? $g_maxPrice : MAX_PRICE;
       
       
       if ( !empty($g_serial)) {
           $result = searchByID($g_serial) ;
       } else {
           $result = searchByMake($g_make, $g_maxPrice) ;
       }
        
   }
   
   // Variables used by Viewer
   $makes = allMake();
   $g_maxPrice = isset($g_maxPrice) && $g_maxPrice !== MAX_PRICE ? $g_maxPrice : "" ;
   $g_make = isset($g_make) ? $g_make : "" ;
   $g_serial = isset($g_serial) ? $g_serial : "" ;
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <style>
             body { font-family: arial;}
            h1 { text-align: center;}
            table { margin:30px auto;}
            table [type="text"] { width: 200px;}
            td { padding: 5px 10px; text-align: center;}
            #resultTable { border-collapse: collapse;}
            #resultTable th {
                border-top: 1px solid black;
                border-bottom: 1px solid black;
                padding: 5px 20px;
                background: #FF9;
            }
            [colspan='6'] { text-align: right; font-size: 0.8em;}
            #resultTable tr:nth-child(2n+1) { background: #DDD;}
        </style>
    </head>
    <body>
        <h1>Search Rental Cars</h1>
        <form action="" method="post">
        <table>
            <tr>
                <td>
                    <input type="text" name="serial" placeholder="Serial No" value="<?= $g_serial ?>">
                </td>
                <td>
                    <select name="make">
                        <?php
                          foreach( $makes as $make) {
                              if ( $make === $g_make) {
                                  echo "<option selected>$make</option>";
                              } else {
                                  echo "<option>$make</option>";
                              }
                          }
                        ?>
                    </select>
                </td>
                
                <td>
                    <?php
                      
                    ?>
                    <input type="text" name="maxPrice" placeholder="Max Price" value="<?= $g_maxPrice ?>">
                </td>
                <td>
                    <input type="submit" name="submit" value="&#x1f50d;">
                </td>
            </tr>
           
        </table> 
        </form>
        
        <?php  if ( isset($result)) { ?>
        <table id='resultTable'>
        <tr>
        <th>NO</th>
        <th>SERIAL NO</th>
        <th>MAKER</th>
        <th>BRAND</th>
        <th>PRICE</th>
        <th>YEAR</th>
        <th>STATUS</th>
        </tr>
        <?php     
            $i = 0 ;
            foreach( $result as $car) {
                echo "<tr>";
                echo "<td>" . ++$i . "</td>" ;
                echo "<td>{$car["serialNo"]}</td>";
                echo "<td>" . strtoupper($car["make"]) . "</td>";
                echo "<td>{$car["brand"]}</td>";
                echo "<td>{$car["price"]}</td>";
                echo "<td>{$car["year"]}</td>";
                echo "<td>" . ($car["status"] ? "&#128077;" : "&#128078") .  "</td>";
                echo "</tr>";
            }
            if ( count($result) === 0) {
                    echo "<tr><td colspan='6'>No cars found</td></tr>";
            } 
         ?>
        </table>
       <?php } ?>
    </body>
</html>
