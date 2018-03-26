<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Annuncio</title>
  </head>
  <body>
    <table border="1">
      <?php

      $AnnuncioID=$_GET['AnnuncioID'];

      $conn=mysqli_connect("localhost","pasquaman", "3P@squaman3", "Luongo");
      $strSQL="SELECT * FROM TAnnunci WHERE AnnuncioID=".$AnnuncioID;

      $query=mysqli_query($conn,$strSQL);
      $row=mysqli_fetch_assoc($query);
      {

      echo (

        "<tr>
        <td>AnnuncioID</td>
        <td>".$row['AnnuncioID']."</td>
        </tr>

        <tr>
        <td>UserID</td>
        <td>".$row['UserID']."</td>
        </tr>

        <tr>
        <td>Data</td>
        <td>".$row['Data']."</td>
        </tr>

        <tr>
        <td>Titolo</td>
        <td>".$row['Titolo']."</td>
        </tr>

        <tr>
        <td>Descrizione</td>
        <td>".$row['Descrizione']."</td>
        </tr>

        <tr>
        <td>Prezzo</td>
        <td>".$row['Prezzo']."€</td>
        </tr>

        <tr>
        <td>Foto 1</td>
        <td><img src=".$row['Foto1']." height=250 width=250></td>
        </tr>

        <tr>
        <td>Foto 2</td>
        <td><img src=".$row['Foto2']." height=250 width=250></td>
        </tr>

        <tr>
        <td><a href=annunciUtente.php?UserID=".$row['UserID'].">Visualizza altri annunci dello stesso Inserzionista</a></td>
        </tr>

        <tr>
        <td><a href=RicercaAnnunciCategoria.php>Torna alla Home</a></td>
        </tr>

        "


      );


    }

       ?>

    </table>

  </body>
</html>
