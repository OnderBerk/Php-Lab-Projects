// Client-Side Validation in Javascript with jQuery
$(function() {
    $("form").submit(function(e) {
      // alert("Submit button clicked");
      $("#errorMessages").empty();
      // Serial No : CCDDDD-DD
      var serial = $("#serial").val().trim() ;
      
      if ( serial.length !== 0) {
        if ( !checkSerial(serial)) {
            $("#errorMessages").append("<p class='invalid'>JS: Invalid Serial No</p>");
            e.preventDefault();
        }
      } else {
        var price = $("#maxPrice").val().trim() ;
        if ( price.length !== 0 && (isNaN(price) || price <= 0) ) {
            $("#errorMessages").append("<p class='invalid'>JS: Invalid Price</p>");
            e.preventDefault();
        } 
      }
    });
}) ;

// Pattern matching for CCDDDD-DD where C: capital letter, D: digit
function checkSerial(s) {
    // pattern length is exactly 9 characters.
    if ( s.length !== 9) return false ;
    if (isLetter(s[0]) && isLetter(s[1]) && 
          isDigit(s[2]) && isDigit(s[3]) && isDigit(s[4]) && isDigit(s[5])
          && s[6] === "-" && isDigit(s[7]) && isDigit(s[8])){
       return true;
    }
    return  false ;
}

// "A" -> 65, and "Z" -> 90
function isLetter(c) {
    return c.charCodeAt(0) >= 65  && c.charCodeAt(0) <= 90 ; 
}

// "0" -> 48 and "9" -> 57
function isDigit(c) {
    return c.charCodeAt(0) >= 48  && c.charCodeAt(0) <= 57 ; 
}


