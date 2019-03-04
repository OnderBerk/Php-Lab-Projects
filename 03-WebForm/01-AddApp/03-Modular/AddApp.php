<?php

if ( isset($_POST["btnAdd"])) {
    // Controller component  
    require "_AddController.php";
      
    // View Component
     require "_AddView.php" ;
    exit;
  }

  require "_AddFormView.php" ;


