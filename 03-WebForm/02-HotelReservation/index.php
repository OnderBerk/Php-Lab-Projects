<?php

  if ( isset($_POST["btnReserve"])) {
      require "_hotelController.php" ;
      require "_hotelView.php" ;
      exit ;
  }
  
  require "_hotelFormView.php" ;