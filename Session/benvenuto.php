

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Benvenuto</title>
  </head>
  <body>


    <?php
        session_start();
        if (isset($_SESSION['usernameSession'])) {
          $username=$_SESSION['usernameSession'];

          echo ("Benvenuto Stronzetto di nome ".$username);
        }
        else {
          session_destroy();
          header("location: index.php");
        }

        /*nella pagina benvenuto ci deve essere un pulsante logout*/



     ?>

     <br>

     <form style="display: inline" action="logout.php" method="get">
        <button>Log Out</button>
    </form>



  </body>
</html>
