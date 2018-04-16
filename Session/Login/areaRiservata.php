

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Area Riservata</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <script>

      function FaseInput(){

        nuovaPSString=document.getElementById("nuovaPS").value;
        confermaPSString=document.getElementById("confermaNuovaPS").value;
        document.getElementById("erroreConferma").innerHTML="";

        errore=false;

        if (confermaPSString!=nuovaPSString) {

          document.getElementById("erroreConferma").innerHTML="errore conferma password";

          errore=true;

        }



      }


      function eseguiCambio(){
        FaseInput();
        if (errore==false) {
          formRiservata.submit();
        }

      }

      </script>
   </head>
   <body>


     <!-- PHP -->

     <?php

        $vecchiaPSSQL=$_POST['vecchiaPS'];
        $nuovaPSSQL=$_POST['nuovaPS'];
        $confermaPSSQL=$_POST['confermaNuovaPS'];
        $emailSQL=$_POST['emailForm'];


          $conn=mysqli_connect("localhost","pasquaman", "3P@squaman3", "Luongo");
          $strSQL="SELECT * FROM Tusers";
          $query=mysqli_query($conn,$strSQL);
          $numeroRecord=mysqli_num_rows($query);
          $row=mysqli_fetch_assoc($query);
          $confermaMail=$row['Email'];

          if ($confermaMail!=1) {
            echo "Va in mona";
            echo $strSQL;
          }



          if ($nuovaPSSQL==$confermaPSSQL) {

            $strSQL2="UPDATE Tusers SET Password=='$confermaPSSQL' WHERE Email=='$emailSQL' ";

            $query=mysqli_query($conn,$strSQL2);
            echo $strSQL2;

            echo "Password cambiata con successo";
          }








      ?>

     <!-- FORM CAMBIA PASSWORD -->

    <div class="container">
      <form class="form-group" action="areaRiservata.php" name="formRiservata" id="formRiservata">


        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="emailForm" name="emailForm" class="form-control form-control-sm" placeholder="Digita la tua mail">
        </div>


        <div class="form-group">
            <label for="name">Vecchia Password:</label>
            <input type="text" id="vecchiaPS" name="vecchiaPS" class="form-control form-control-sm" placeholder="Digita la password attuale">
        </div>

        <div class="form-group">
            <label for="name">Cambia Password:</label>
            <input type="text" id="nuovaPS" name="nuovaPS" class="form-control form-control-sm" placeholder="Digita la nuova password">
        </div>

        <div class="form-group">
            <label for="name">Conferma la nuova Password:</label>
            <input type="text" id="confermaNuovaPS" name="confermaNuovaPS" class="form-control form-control-sm" placeholder="Conferma la nuova password"><label id="erroreConferma"></label>
        </div>

        <button type="submit" class="btn btn-primary" onclick="eseguiCambio">Cambia Password</button>

      </form>
    </div>



     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   </body>
 </html>
