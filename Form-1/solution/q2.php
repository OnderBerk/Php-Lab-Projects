<?php
 $flowers = [
             ["Rose", "rose.jpg", 15],  
             ["Daisy", "daisy.jpg" , 10],  
             ["Tulip", "tulip.jpg", 20],  
          ] ;
  if ( isset($_POST["BuyBtn"])) {
      // 1. Sanitize
      $sanitize = [] ;
      foreach( $_POST as $k => $v) {
          $sanitize[$k] = filter_var($v, \FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
      }
      
      // 2. Validate
      $error = [] ;
      if (filter_var($sanitize["quantity"], \FILTER_VALIDATE_INT, ["options"=>["min_value"=>1]]) === false) {
          $error[] = "quantity" ;
      }
      
      // 3. Process
      if ( empty($error)) {
          // Calculate Price
          $price = $flowers[ $sanitize["flower"]][2] *  $sanitize["quantity"] ;
          echo "<h1>Your Bouquet</h1>";
          echo "<h3>{$sanitize['quantity']} x {$flowers[ $sanitize["flower"]][0]}</h3>";
          echo "<p><strong>Price :</strong> $price TL</p>" ;
          echo "<p><strong>Message :</strong><br>{$sanitize["message"]}</p>" ;
          echo "<p><a href=''>Go back to form</a></p>" ;
          exit;
      }
      
  }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <style>
            table { margin: 30px auto; border-collapse: collapse;}
            td { padding:10px; border-bottom:1px solid #aaa; border-top:1px solid #aaa;}
            .first {text-align: center;}
            span { color: red;}
            h1 { text-align: center;}
        </style>
    </head>
    <body>
        <form action="" method="post">
            <h1>Flower Shop</h1>
            <table>
                <tr class="first">
                   <?php
                    $current = 0 ;
                    if ( isset($error)) $current = $sanitize["flower"] ;
                     for ( $i=0; $i<3; $i++) {
                        echo "<td><img src='{$flowers[$i][1]}'><br><input type='radio' name='flower' value='$i' " . ($current==$i ? " checked " : "") . ">{$flowers[$i][0]}</td>" ;
                     }
                   ?>
                </tr>
                <tr>
                    <td>Quantity : </td>
                    <td colspan="2"><input type="text" name="quantity" size="3" value="<?= isset($error) ? $sanitize["quantity"] : ""; ?>">
                      <?= isset($error) ? "<span>Enter a valid quantity</span>" : ""; ?> 
                    </td>
                                           
                </tr>
                <tr>
                    <td>Message : </td>
                    <td colspan="2"><textarea name="message" cols="30" rows="3"><?= isset($error) ? $sanitize["message"] : ""; ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" name="BuyBtn" value="Buy">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
