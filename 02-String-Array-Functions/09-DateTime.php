<?php
date_default_timezone_set("Europe/Istanbul");
$now = new DateTime() ;
var_dump($now);

$LosAngeles = new DateTime(NULL, new DateTimeZone("America/Los_Angeles"));
var_dump($LosAngeles);

// Set specific Date
$birthday = new DateTime("1996-08-30 17:50:12") ;
$univStart = DateTime::createFromFormat("d/m/Y", "2/8/2016") ; // custom date format

// Display Date with custom format
// check format characters in http://php.net
echo "The birthday is " . $birthday->format("d F Y") , "<br>";
echo "The birthday is " . $birthday->format("M, d, Y, l H:i A") , "<br>";

// modify a date
$afterSomeTime = clone $univStart ;
$afterSomeTime->modify("+4 years -3 months +3 days");
echo $afterSomeTime->format("d F Y"), "<br>";

// find difference
$age = $now->diff($birthday) ;
echo "Since your birthday, {$age->y} years, {$age->m} months and {$age->d} days elapsed. Totally, {$age->days} days.<br>";