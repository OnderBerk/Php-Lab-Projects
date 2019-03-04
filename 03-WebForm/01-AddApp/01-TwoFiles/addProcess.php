<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            p { text-align: center;}
        </style>
    </head>
    <body>
        <?php
        // Backend
        // var_dump($_POST);
        //Access Data sent from Browser (User)
        $num1 = $_POST["num1"] ;
        $num2 = $_POST["num2"] ;
        
        // 2. Processing
        $sum = $num1 + $num2 ;
        
        // 3. Output
        echo "<p>The sum of $num1 and $num2 is equal to $sum</p>" ;
        echo "<p><a href='addForm.php'>Go back to Form</a></p>" ;
        ?>
    </body>
</html>
