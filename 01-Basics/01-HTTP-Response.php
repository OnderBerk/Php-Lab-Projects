<?php
   // This is a php program that generates html output.
   // You can generate any content type from image to pdf documents.
   // However, you need to tell the browser the content type explicitly 

   // HEADER PART
   // html content is default content type. You don't have to write the following
   // line.
   header("Content-Type: text/html") ;
   // header("Content-Type: text/text") ;
   // header("Content-Type: image/jpg") ;
   // header("Content-Type: application/json") ;
   
   
   // CONTENT PART
   // "echo" is a built-in statement (not a function) used to generate output to browser.
   // String or Text are prepared by double/single quotes.
   // This page builds an html page.
   echo "<!DOCTYPE html>\n";
   echo "<html>" ;
   echo "<head>" ;
   echo "<title>HTTP Response</title>" ;
   echo "</head>" ;
   echo "<body>" ;
   echo "<h1>Introduction to PHP</h1>" ;
   echo "<p>Some text here...</p>" ;
   echo "</body>" ;
   echo "<html>" ;
   

