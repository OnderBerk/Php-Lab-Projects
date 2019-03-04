<?php
  var_dump($_SERVER["REQUEST_METHOD"]) ;
  if ( isset($_POST["btnAdd"])) {
    // The request is POST
    $num1 = $_POST["num1"] ;
    $num2 = $_POST["num2"] ;

    // 2. Processing
    $sum = $num1 + $num2 ;

    // 3. Output
    echo "<p>The sum of $num1 and $num2 is equal to $sum</p>" ;
    echo "<p><a href=''>Go back to Form</a></p>" ;
    exit;
  }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            h1 { text-align: center;}
            body { font-family: arial;}
            table { margin: 30px auto;}
            td { padding: 15px;}
        </style>
    </head>
    <body>
        <h1>Addition Form</h1>
        <form action='' method='post'>
            <table>
                <tr>
                    <td><input type='text' name='num1' placeholder="Number 1"></td>
                    <td><input type='text' name='num2' placeholder="Number 2"></td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <!--<input type='submit' name='btnAdd' value='ADD' />-->
                        <button type='submit' name='btnAdd'>ADD</button>
                    </td>
                  
                </tr>
            </table>
        </form>
    </body>
</html>
