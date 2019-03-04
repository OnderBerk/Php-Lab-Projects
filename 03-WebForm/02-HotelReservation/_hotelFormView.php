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
        <h1>Hotel Reservation System</h1>
        <form action='index.php' method='POST'>
            <table>
                <tr>
                    <td>Season</td>
                    <td>
                        <input type='radio' name='season' value='0' checked> Hot Season
                        <input type='radio' name='season' value='1'> Normal Season
                    </td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>
                        <select name='type'>
                            <option value='0'>Full Board</option>
                            <option value='1'>Half Board</option>
                        </select>
                        
                    </td>
                </tr>
                <tr>
                    <td>Count</td>
                    <td>
                        <input type='text' name='count' size='4'>
                    </td>
                </tr>
                <tr>
                    <td>Flight</td>
                    <td>
                        <input type='checkbox' name='flight' />
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <button type='submit' name='btnReserve'>Reserve</button>
                    </td>
                    
                </tr>
            </table>
        </form>
    </body>
</html>
