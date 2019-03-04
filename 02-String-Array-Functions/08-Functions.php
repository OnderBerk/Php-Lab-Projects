<?php //declare(strict_types=1); // No implicit type conversion at all. ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Functions
        // Function names are case-insensitive unlike variable names.
        // Optionally, you can give types for arguments, but this is optional
        // If type does not match, PHP7.x versions throw TypeError exception.
        // Type also gives hints to IDE, in this way, IDE provides auto complete suggestions
        
        // without type
        function add1( $n1, $n2) {
            return $n1 + $n2 ;
        }
        
        // Types can be : int, float, bool, string, array, class or interface name
        // Attention: cannot be integer, double, boolean
        function add2(float $n1, float $n2) : float {
            $sum = $n1 + $n2 ;
            return $sum;  // if it returns "test" -> TypeError Exception
        }
        
        $sum = add1("hello", 3.12) ; // "hello" -> (float) 0
        //$sum = @add1("hello", 3.12) ; // @: supress warning
        echo "<p>Add1 : $sum </p>";
        
        $sum = ADD2( 5, 3.12) ; // Ok , function name is case insensitive
        $sum = ADD2( "5", 3.12) ; // Ok , function name is case insensitive
        //$sum = add2("hello", "3.12") ; // Fatal Error, "hello" is not numeric string. 
        //$sum = add2("t5", 3.12);  // throw exception TypeError
        echo $sum ;
        
        // function arguments can be dynamic, func_get_args() return all arguments.
        function fn() {
            var_dump(func_get_args()) ;
        }
        
        fn(1,2,3,4) ;
        fn(5,6);
        
        function sum() {
            $s = 0 ;
            foreach( func_get_args() as $val) {
                $s += $val ;
            }
            return $s;
        }
        echo sum(1,2,3), "<br>" ;
        
        // variadics (...) and optional parameters
        function test($required, $optional = 0, ...$rest) {
            echo "<p>Required : $required Optional : $optional </p>";
            var_dump($rest);
        }
        test(12) ; // required = 12
        test(12, 15); // required = 12, optional = 15
        test(12, 15, 45, 46, 47) ; // required = 12, optional = 15, $rest = [45, 46, 47]
        
        // Pass by value and Pass by reference
        // Pass by reference requires a variable, it cannot be literal.
        function process($inp, &$out) {
            $inp++; // orginal argument $a will not be updated.
            $out = $inp * 2 ; // $out is a reference, and it modifies.
        }
        $a = 5 ;
        process($a, $b);  // $a: pass by value, $b: pass by reference
        echo "<p>\$a : $a and \$b = $b</p>";
        
        // Arrays are passed by value by default
        // Only "objects" are passed by reference.
        $arr = [1,2,3] ;
        
        // To modify an array, pass the array by reference
        // This function will not bhange orginal $arr
        function setFirst1($argArray) {
            $argArray[0] = 100 ;
        }
        setFirst1($arr);
        echo "<p>First Item of Array (\$arr): {$arr[0]} </p>";
        
        // Pay attention to the first character which & in argument.
        function setFirst2(&$argArray) {
            $argArray[0] = 100 ;
        }
        setFirst2($arr);
        echo "<p>First Item of Array (\$arr): {$arr[0]} </p>";
        
        // Variable scope in functions
        // $version is global variable, all statements in the program can
        // access $version
        $version = "1.2v" ;
        // $v and $n are local variables.
        function scope($n) {
            global $version ; // explicitly declare $version is global var.
            $v = $version ; // to read
            $version = "1.3v" ;
            // or
            // $v = $_GLOBALS["version"];
            
            // $_SERVER - super global, it does not need "global", just use it
            $client_ip = $_SERVER["REMOTE_ADDR"];  
            echo "Remote IP : $client_ip", "<br>";
        }
       
        scope(16);
        echo "Version : $version", "<br>";
        
        // OPTIONAL: not included in CTIS256
        
        // Lambda and Closure
        // Lambda function or anonymous function
        // function returns a callable object.
        $fn = function($a, $b) {
            return $a + $b ;
        };
        echo $fn(3,5) , "<br>" ;
        
        // Closure
        function counter($start) {
            $count = $start ;
            return function() use (&$count) {
               return ++$count;  
            };
        }
        $c1 = counter(10);
        $c1();
        $c1();
        echo $c1() , "<br>"; // 13
        $c2 = counter(100);
        $c2();
        $n1 = $c1();
        $n2 = $c2();
        echo "n1 : $n1 and n2: $n2<br>"; // 14, 101
        
        ?>
    </body>
</html>
