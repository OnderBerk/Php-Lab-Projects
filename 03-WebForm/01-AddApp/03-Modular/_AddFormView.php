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
        <form action='AddApp.php' method='post'>
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
