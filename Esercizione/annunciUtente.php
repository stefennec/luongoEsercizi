<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Annunci Utente</title>
  </head>
  <body>

    <?php
      $UtenteID=$_GET['UserID'];
      $conn=mysqli_connect("localhost","pasquaman", "3P@squaman3", "Luongo");
      $sqlUsers=("SELECT * FROM TAnnunci INNER JOIN Tusers ON TAnnunci.UserID=Tusers.UserID WHERE Tusers.UserID='$UtenteID'");
      echo $sqlUsers;
      $query=mysqli_query($conn,$sqlUsers);
     ?>

     <table border="1">
       <tr>
         <td>ID Annuncio</td>
         <td>Data</td>
         <td>Titolo</td>
         <td>Prezzo</td>
         <td>Foto</td>
         <td>Nome Inserzionista</td>
         <td>Dettagli</td>
       </tr>

       <?php
       while ($row=mysqli_fetch_assoc($query)) {
         echo ("<tr>
                 <td>".$row['AnnuncioID']."</td>
                 <td>".$row['Data']."</td>
                 <td>".$row['Titolo']."</td>
                 <td>".$row['Prezzo']."€</td>
                 <td><img src=".$row['Foto1']." height=250 width=250></td>
                  <td>".$row['Username']."</td>
                  <td><a href=annuncio.php?AnnuncioID=".$row['AnnuncioID'].">Dettagli</a></td>

               </tr>");
       }
       mysqli_close($conn);
        ?>

     </table>

  </body>
</html>
