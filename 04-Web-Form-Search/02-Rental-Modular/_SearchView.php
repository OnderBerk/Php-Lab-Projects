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
        <table id="searchTable">
            <tr>
                <td>
                    <input type="text" name="serial" placeholder="Serial No" value="<?= $g_serial ?>">
                </td>
                <td>
                    <select name="make">
                        <?php
                          foreach( $allMakers as $make) {
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
                   <input type="text" name="maxPrice" placeholder="Max Price" value="<?= $g_maxPrice ?>">
                </td>
                <td>
                    <button type="submit" name="btnSearch">&#x1f50d;</button>
                </td>
            </tr>
           
        </table> 
        </form>
        <?php if (isset($result)) { ?>
        <table id="resultTable">
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
                $count = 0 ;
                foreach( $result as $car) {
                    echo "<tr>";
                    echo "<td>" . ++$count . "</td>";
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