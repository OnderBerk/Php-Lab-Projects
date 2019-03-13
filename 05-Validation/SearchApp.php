<?php
// TO TEST SERVER-SIDE VALIDATION: do not import clientValidate.js 
require "carsDB.php";
require "util.php";

const MAX_PRICE = 100000;

if (isset($_POST["submit"])) {
    // 1. INPUT STAGE: prepare all input data (trim etc.)
    // extract($_POST,EXTR_PREFIX_ALL, "g") ;
    foreach ($_POST as $key => $value) {
        $key = "g_" . $key;
        $$key = trim($value); // all fields in the form are trimmed.
    }

    // Filter all input (validate)
    require "serverValidate.php";

    // 2. PROCESSING STAGE: Processing starts if all data are validated.
    // if $error is empty, it means that all data are valid.
    if (empty($error)) {
        // search based on serial
        $g_maxPrice = !empty($g_maxPrice) ? $g_maxPrice : MAX_PRICE;
        if (!empty($g_serial)) {
            $result = searchByID($g_serial);
        } else {
            $result = searchByMake($g_make, $g_maxPrice);
        }
    }
}

// 3. OUTPUT STAGE: Escape(sanitize) all outputs for appropriate target (html in this example)
// Global Variables that will be used by Output/Viewer.
$makes = allMake();

$g_maxPrice = isset($g_maxPrice) && $g_maxPrice !== MAX_PRICE ? filter_var($g_maxPrice, FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "";
$g_make = isset($g_make) ? filter_var($g_make, FILTER_SANITIZE_FULL_SPECIAL_CHARS) : ""; 
$g_serial = isset($g_serial) ? filter_var($g_serial, FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="search.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-3.1.1.js" type="text/javascript"></script>
        <script src="clientValidation.js" type="text/javascript"></script>
        <!--<script src="clientValidation.js" type="text/javascript"></script>-->
    </head>
    <body>
        <h1>Search Rental Cars</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <input id="serial" type="text" name="serial" placeholder="Serial No" value="<?= $g_serial ?>">
                    </td>
                    <td>
                        <select name="make">
                            <?php
                            foreach ($makes as $make) {
                                if ($make === $g_make) {
                                    echo "<option selected>$make</option>";
                                } else {
                                    echo "<option>$make</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>

                    <td>
                        <input id="maxPrice" type="text" name="maxPrice" placeholder="Max Price" value="<?= $g_maxPrice ?>">
                    </td>
                    <td>
                        <input type="submit" name="submit" value="&#x1f50d;">
                    </td>
                </tr>

            </table>
            <div id="errorMessages">
                <?php
                if (!empty($error)) {
                    foreach ($error as $e) {
                        echo "<p class='invalid'>", $e, "</p>";
                    }
                }
                ?>
            </div>
        </form>

        <?php if (isset($result)) { ?>
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
                $i = 0;
                foreach ($result as $car) {
                    echo "<tr>";
                    echo "<td>" . ++$i . "</td>";
                    echo "<td>{$car["serialNo"]}</td>";
                    echo "<td>" . strtoupper($car["make"]) . "</td>";
                    echo "<td>{$car["brand"]}</td>";
                    echo "<td>{$car["price"]}</td>";
                    echo "<td>{$car["year"]}</td>";
                    echo "<td>" . ($car["status"] ? "&#128077;" : "&#128078") . "</td>";
                    echo "</tr>";
                }
                if (count($result) === 0) {
                    echo "<tr><td colspan='7'>No cars found</td></tr>";
                }
                ?>
            </table>
        <?php } ?>
    </body>
</html>
