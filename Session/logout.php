<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
  </head>
  <body>

    <?php

    session_start(); //to ensure you are using same session
    session_destroy(); //destroy the session
    header("location:index.php"); //to redirect back to "index.php" after logging out

     ?>



  </body>
</html>
