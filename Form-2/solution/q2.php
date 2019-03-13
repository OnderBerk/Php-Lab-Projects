<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table { border-collapse: collapse; }
            td { padding: 10px; border:1px solid #666;}
            .error { font-weight: bold; color: red; font-style: italic; background: #DDD;}
            p span { font-style: italic; color: #666;}
        </style>
    </head>
    <body>
        <?php
            if ( isset($_POST["submit"])) {
                extract($_POST) ;
                $error = [] ;
                // Validate Report No
                $reportNo = filter_var($reportNo, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
                if ( filter_var($reportNo, FILTER_VALIDATE_INT, ['options' => ['min_range'=> 1000]]) === false) {
                   $error[] = "reportNo" ; 
                }
                // Sanitize textbox
                $message = filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;

                if ( empty($error)) {
                    echo "<p>To : <span>$department</span></p>" ;
                    echo "<p>Report No : <span>$reportNo</span></p>" ;
                    echo "<p>Message : <br><span>$message</span></p>" ;
                    echo "<p><a href='q2.php'>Back to Form</a></p>";
                    exit ;
                }
            }
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Department : </td>
                    <td>
                        <select name="department">
                            <?php
                                require_once './db.php' ;
                                foreach( $departments as $dep) {
                                    echo "<option ";
                                    if ( isset($department) && $department == $dep) {
                                        echo " selected" ;
                                    }
                                    echo ">$dep</option>" ;
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr <?= !empty($error) ? " class='error'" : "" ?>>
                    <td>Report No:</td>
                    <td><input type="text" name="reportNo"
                            <?= isset($reportNo) ? " value='$reportNo'" : " value=''" ; ?>></td>
                </tr>
                <tr>
                    <td>Message : </td>
                    <td>
                        <textarea name="message" rows="5" cols="40"><?= isset($message) ? $message : '' ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Send">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
