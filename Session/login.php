<?php

echo "<h1>CIAO</h1>";


//il modulo del login prevede che:

//EMAIL e PASSWORD  CORRETTE

//CONTROLLO REGISTRAZIONE confermata




 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Login Area</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
     <script>

     function FaseInput(){

     emailString=document.getElementById("email").value;
     passwordString=document.getElementById("password").value;
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
         esercizio_Email.submit();
       }

     }


     </script>
   </head>
   <body>
     <div class="container">
       <form class="form-group" name="loginForm" id="loginForm" action="login.php" method="post">
         <h3>Email:</h3>
         <input type="text" id="email" name="email" value="" placeholder="Inserisci Email"><label id="erroreEmail"></label>
         <h3>Password:</h3>
         <input type="text" id="password" name="password" value="" placeholder="Inserisci Password"><label id="errorePassword"></label>
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
