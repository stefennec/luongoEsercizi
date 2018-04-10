<?php

$emailSQL=$_POST['emailForm'];
$passwordSQL=$_POST['passwordForm'];



if (!empty($emailSQL)) {
  $conn=mysqli_connect("localhost","pasquaman", "3P@squaman3", "Luongo");
  $strSQL="SELECT * FROM `Tusers` WHERE `Email`='$emailSQL' AND `Password`='$passwordSQL'";
  $query=mysqli_query($conn,$strSQL);
  $numeroRecord=mysqli_num_rows($query);
  $row=mysqli_fetch_assoc($query);
  $confermaRegistrazione=$row['RegistrazioneConfermata'];

  echo $strSQL;



    if ($numeroRecord==0) {
      echo("Devi prima registrarti");
      mysqli_close($conn);
    }
    else {
      if ($confermaRegistrazione==0) {
        echo('devi confermare la tua email');
        return;
        mysqli_close($conn);
      }
      else {
        header("location: areaRiservata.php");
        return;
        mysqli_close($conn);
      }
    }
}

 ?>









 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Login Area</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
     <script>

     function FaseInput(){

     emailString=document.getElementById("emailForm").value;
     passwordString=document.getElementById("passwordForm").value;
     indiceChiocciola=emailString.indexOf("@");
     lunghezzaMail=emailString.length;
     lunghezzaPassword=passwordString.length;
     indiceSpazio=emailString.indexOf(" ");

     document.getElementById("erroreEmail").innerHTML="";
     document.getElementById("errorePassword").innerHTML="";

     errore=false;

     if (indiceChiocciola==-1||lunghezzaMail<6||indiceSpazio!=-1){
       document.getElementById("erroreEmail").innerHTML="Email non valida";
       errore=true;
     }

     if (lunghezzaPassword<6){
       document.getElementById("errorePassword").innerHTML="Password non valida";
       errore=true;
     }

    }

     function eseguiRegistrati(){
       FaseInput();
       if (errore==false) {
         loginForm.submit();
       }

     }


     </script>
   </head>
   <body>




     <div class="container">
       <form class="form-group" name="loginForm" id="loginForm" action="index.php" method="post">
         <h3>Email:</h3>
         <input type="text" id="emailForm" name="emailForm" value="" placeholder="Inserisci Email"><label id="erroreEmail"></label>
         <h3>Password:</h3>
         <input type="text" id="passwordForm" name="passwordForm" value="" placeholder="Inserisci Password"><label id="errorePassword"></label>
         <br>
         <br>
         <h3>Registrati:</h3>
         <button type="button" name="button" class="btn btn-info" onclick="eseguiRegistrati()">Accedi</button>
       </form>
     </div>


     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   </body>
 </html>
