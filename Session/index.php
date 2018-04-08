

<?php

session_start();

if (isset($_SESSION['usernameSession'])) {
  header("location:benvenuto.php");
}


$username=$_POST['campousername'];
$password=$_POST['campopassword'];

$conn=mysqli_connect("localhost","pasquaman", "3P@squaman3", "Luongo");
$str_sql="SELECT * FROM Tusers WHERE Username='$username' AND Password='$password'";
$query=mysqli_query($conn,$str_sql);
if((empty($username)) && ($password))
{
  return;
}

$query=mysqli_query($conn,$str_sql);
mysqli_close($conn);

echo $query;


        if (mysqli_num_rows($query)==1)
        {
          //echo ("Benvenuto");
          //posso inizializzare variabile session che rimane per tutta la durata della sessione

          $_SESSION['usernameSession']=$username;

          header("location:benvenuto.php");
      }

      else {

      }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login.php</title>
    <script type="text/javascript">
      function Login(){
        cercaUsernameString=loginsession.campousername.value;
        cercaPasswordString=loginsession.campopassword.value;
        document.getElementById("campousername").innerHTML="";
        document.getElementById("campopassword").innerHTML="";
        document.getElementById("erroreUsername").innerHTML="";
        document.getElementById("errorePassword").innerHTML="";
        errore=false;


        if (cercaUsernameString=="")  {
          errore=true;
          document.getElementById("erroreUsername").innerHTML="Digita Username";
        }

        if (cercaPasswordString=="") {
          errore=true;
          document.getElementById("errorePassword").innerHTML="Digita Password";
        }

        if (errore ) {
          return;
        }
        else {
          loginsession.submit();
        }


      }


    </script>
  </head>
  <body>

    <h1>Prova di sessione</h1>

    <form name="loginsession" id="loginsession" action="index.php" method="post">
      <h2>Username:</h2>
      <input type="text" name="campousername" id="campousername" value=""><label id="erroreUsername"></label>
      <h2>Password:</h2>
      <input type="text" name="campopassword" id="campopassword" value=""><label id="errorePassword"></label>
      <br>
      <br>
      <button type="button" name="button" onclick="Login()">Login</button>
    </form>

  </body>
</html>
