<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Web Page.</title>
        <style>
        </style>
    </head>
    <body>
        <h1>Static Heading in the Document.</h1>
        <p>This paragraph is also static since its content does not change.</p>
        <?php
        // This is called PHP code block.
        // PHP code blocks are used to generate dynamic contents.
        // Outside of the PHP code block will be used as the output.
        // The following line creates a random number in each execution. Therefore,
        // its content is dynamic.
        // "dot operator" is used to concatenate.
        echo "<p>" . rand(0,100) . "</p>" ;
        ?>
    </body>
</html>
