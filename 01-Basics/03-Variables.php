<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // phpinfo(); // configuration details of php installed.
        // Single Line Comment
        /* Multi Line Comment */
        # Perl Style Line Comment
        
        // Variable is a memory location that stores values
        // Variables start with $ sign. It starts with letters or underscore _
        // Variables are case sensitive, $age is not the same with $Age
        // Valid: $age, $_name, $user1  Invalid: $123, $*name, $1name1
        // Variable Types:
        // Scalar Types : integer(int), float(float), string, 
        // boolean(bool),null
        // Composite Types : Array, Object
        // Resources : OS level resource handles 
        // (file and db connection handle)
        
        // PHP is a loosely-typed language. 
        // There is no need to declare type explicitly.
        // PHP determines the type based on assignment. 
        // PHP imlicitly cast (convert) the types according to the operation.
        
        // integer: literal values, always signed integer. 
        // decimal(base10): 123  
        // octal(base8): 0100 (leading "zero") 
        // hexadecimal(base16): 0x100 (leading "0x" or "0X") 
        // binary(base2): 0b10101 (leading "0b" or "0B")
        // exponential: 12e2  ( e or E for "10 over")
        // int
        $age = 25;
        $flag = 0b1010; // 10 in decimal
        $redChannel = 0xFE; // 254 in decimal
        $salary = 25e3 ;  // 25000 in decimal
        var_dump($age); // display the variable for debugging.
        
        // convert from decimal "123" to hexadecimal -> "7B"
        // first parameter is a string.
        var_dump(base_convert("123", 10, 16)); 
        
        // convert from hex "0xFC" to binary -> "1111 1100"
        var_dump(base_convert("0xFC", 16, 2)); 
        
        // float/double
        $cgpa = 3.12;
        $width = 1.234e-2; // 0.01234
        
        
        // bool or boolean
        $paid = true ; 
        $finished = false;
        $result = ( $age === 25) ; // return true or false
        $sum = (0.1 + 0.7) === 0.8; // returns false, why? Rounding Error 
        
        // string
        // string  by double quotes are called "string with replacement"
        // string  by single quotes are called "string without replacement"
        // "string with replacement" replaces variables with their own values.
        $firstName = "ali" ;
        $surname = 'gül';
        $fullname = "$firstName $surname" ; // output: "ali gül"
        
        // output: "$firstName $surname"(no replacement) in single quote string
        $_fullname= '$firstName $surname' ; 
        
        // concatenation of strings with "." operator
        $outName = "<p>Your name is " . $fullname . "</p>" ; 
        
         // this is the same with previous one.
        $outName = "<p>Your name is $fullname </p>" ;
        
        // "." is useful in expressions.
        $total = "<p>Annual Salary is " . (12 * $salary) . "</p>"; 
        
        // escape \ for double quote, \n, \t, \r
        $quote = "... and said \"hello\" to his friend" ; 
        
        // add unicode symbols with utf-8 encoding
        $someSymbols = "The sum symbol is \xE2\x88\x91 and its ..." ; 
        
        // unicode rocket symbol. it takes 4 bytes in utf-8.
        $rocketSymbol = "Rocket symbol is \xF0\x9f\x9a\x80" ; 
        
        // heredoc,  a block of text with replacement
        // heredoc identifier MYOUT is arbitrary, you can use any labels.
        // At the end, the label (MYOUT) must start at the beginning of the line
        $out =<<<MYOUT
            <hr>
            <h1>Welcome $fullname to site</h1>
            <p>Your age is $age and your cgpa is $cgpa</p>
            <p><a href="main.php">To go main page</a></p>
            <hr>
MYOUT;
        
        // Produce/generate output
        echo $outName;
        // more than argument to echo separated by ","
        echo "<p>", $rocketSymbol, "</p>"; 
        
        // Array: composite type
        // sequential arrays
        $colors = ["red", "green", "blue"] ; 
        
        // associative array
        $person = [ "name" => "ali", "lastname" => "gül", "id" => 12345] ; 
        var_dump($colors);
        var_dump($person);
        
        // echo is a php construct, not a function. It does not return anything
        // It is not a built-in function. They are case insensitive.
        // ( echo = ECHO = Echo or if = IF = If or return = RETURN = Return)
        // Other PHP constructs: echo, print, return, isset, empty, unset, 
        // exit, die, include, require, list, function, if, for, foreach etc.
        // echo and print are similar, print can take only one parameter.
        print "<p>Total price is total</p>";
        
        // check if $age is assigned to any value other than null, returns true
        isset($age) ; 
        isset($hello); // returns false, because there is no variable as $hello
        
        isset($age); // true
        
        // false, a variable is empty if it is one of "", "0", 0, [], null
        empty($age); 
        
        $str = "0" ;
        isset($str); // true, $str is assigned to empty string.
        empty($str); // true, $str is empty string.
        
        $any = null;
        isset($any); // false, assigned to null 
        empty($any); // true
        
        unset($age); // deletes the variable
        echo $age ; // $age is not available, it gives a warning.
        
        // exit("it is now exiting") ; die("it is now exiting"); 
        // exit; or die; without any message, no paranthesis.
        
        // gettype() returns "integer", "double", "boolean", 
        // "string", "array", "object", "resource", "NULL" 
        // attention: it does not return "float", returns "double" instead.
        echo gettype(1.23);
        
        // Type Conversion
        $a = (int) 3.12; // it truncates after decimal point, no rounding.
        
        // be careful, result is 7 not 8, because 0.1+0.7 = 0.799999999
        $a = (int) ((0.1 + 0.7) * 10) ; 
        echo "<p>Rounding Error : $a</p>";
        $b = (bool) $a ; // true
        $b = (bool) "" ; // false, or 0, "", "0", [], null are falsy values.
        
        $a = "789";
        $a = (int) $a; //  (string) "789" -> (int) 789 
        echo $a ;
        
        // (int) "3.12" -> 3, (double) "3.12" -> 3.12
        // (int) "7.13px" -> 7 , (float) "7.13px" -> 7.13
        // (int) "1.2e3 is measured" -> 1200
        
        // Variable variables
        $a = "foo";
        $$a = "bar"; // creates $foo = "bar", $a replaced by "foo"
        echo "<p>", $foo, "</p>";
        
        // Constants: its value cannot change, immutable. 
        const PORT = 80 ;
        const message = "Welcome to the site" ;
        const LNG = "en" ;
        define("NUM", 12) ;
        define("LOCALHOST", "127.0.0.1" ) ;
        
        echo "localhost ip is " , LOCALHOST , " and port # is " , PORT ;
        echo "<p>Total value is ", 10 * NUM, "</p>";
        
        // SuperGlobals: before executing a php program, 
        // PHP Engine creates following arrays.
        // These arrays are accessible from any scope.
        // $_SERVER: about paths, header and server environment
        // $_GET, $_POST, $_FILES, $_COOKIES, $_SESSION, $_ENV
        var_dump($_SERVER);
        
        // Anatomy of a URL:
        /* 
         http://www.one.net/app/display.php/project/ttm?id=5&lng=en
         REQUEST_METHOD: GET, REQUEST_SCHEME: http
         DOCUMENT_ROOT: C:\wamp64\www
         SCRIPT_FILENAME (physical address): C:\wamp64\www\app\display.php
         SCRIPT_NAME (logical): /app/display.php
         REQUEST_URI: /app/display.php/project/ttm?id=5&lng=en
         PHP_SELF : /app/display.php/project/ttm
         PATH_INFO: /project/ttm
         QUERY_STRING: id=5&lng=en
         HTTP_USER_AGENT: fingerprint of Web Browser
         */
        
        // Magic Constants
        // __FILE__ : physical address of file, __LINE__ : line number
        // __CLASS__ : class name, __FUNCTION__ : current function name
        // __METHOD__ : method name, __NAMESPACE__ : current namespace
        echo "<p>FILE : ", __FILE__, " Line No: ", __LINE__, "</p>";
      
        // OPERATORS:
        // Operators: (Syntax is the same with C, Javascript)
        // Arithmetic (binary): +, -, /, *, %, ** (power), 
        // intdiv(dividend, divisor)->quotient
        $res = ((8 * 3) + 20)/2 + 3**2 ;
        echo intdiv(10, 3) ; // 3
        // Arithmetic (unary): (prefix or postfix): ++, --
        // Assignment: =, +=, -=, *=, %=, .= (append)
        // Logic Operators: (and) &&, (or) ||, (xor) ^, (not) !
        // Relational Operators: <, >, <=, >= , ==, ===, !=, !==
        $remainingCourse = 0 ;
        $finish = $cgpa > 2.0 && $remainingCourse === 0 ;
        // Ternary Operators: condition ? true_expression : false_expression
        $color = $cgpa > 2.0 ? "green" : "red" ;
        
        $grade = isset($cgpa) ? $cgpa : 2.0;
        // Null Coalesing Operator: check the existence of a variable, 
        // and if it exists it uses that value
        // This operator can be chained, for example, $cgpa ?? $gpa $$ 2.0
        
        // this is the same with $grade = isset($cgpa) ? $cgpa : 2.0;
        $grade = $cgpa ?? 2.0;  
        
        // Spaceship Operator
        // a <=> b, ( a > b) return 1, ( a === b) return 0, ( a < b) return -1
        // Useful in callback functions that will be explained later.
        $res = $cgpa <=> 3.0 ; // 1 because $cgpa = 3.12 > 3.0
        
        // Bitwise operators: (and): &, (or): |, (xor): ^
        // shift right >>, shift left
        $a = 0b1011 ;  // 11
        $b = 0b0101 ;
        echo "<p>Bitwise AND : ", $a & $b, " OR: ", $a | $b;
        echo " XOR: ", $a ^ $b, "</p>";
        // Shift left can be used to muliply by 2 to the power of shift amount.
        echo "<p>Shift Left: ", $a << 2, "</p>" ; // same as $a * 4 ->  44
        
        // integer divide by 2, intdiv(11,2) -> 5
        echo "<p>Shift Right: ", $a >> 1, "</p>" ; 
        
        // References
        $a = 5 ;
        $b = &$a; // & in front of $a shows that $b is a reference to $a.
        echo "a: $a, b: $b <br>" ;
        $b++; // changing $b effects $a, since they share the same memory area.
        echo "a: $a, b: $b <br>" ;
        
        // LOGICAL and LOOP Structures are exactly the same with Javascript
        
        ?>
    </body>
</html>
