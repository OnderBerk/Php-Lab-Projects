<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            p { text-align: center;}
            body { font-family: arial;}
            table { margin: 30px auto;}
            td { padding: 15px;}
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td>Season</td>
                <td><?= $str_season[$season] ?></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><?= $str_type[$type] ?></td>
            </tr>
            <tr>
                <td>Flight</td>
                <td><?= isset($flight) ? "Yes" : "No" ?></td>
            </tr>
            <tr>
                <td>Count</td>
                <td><?= $count ?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><?= $price ?></td>
            </tr>
        </table>
        <p><a href='index.php'>Go Back to Reservation</a></p>
    </body>
</html>
