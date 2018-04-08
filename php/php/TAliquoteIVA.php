<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tabella Aliquota Iva</title>
  </head>
  <body>

    <table border=1px>
      <tr>
        <td>ID</td>
        <td>Aliquota IVA</td>
      </tr>


    <?php

    $conn=mysqli_connect(localhost,"stefanophp7", "3pasquaman3", "my_stefanophp7"); // creo la connessione
    $strSQL="SELECT * FROM TArticoli ORDER BY ArticoloID"; // determino la stringa sql

    $query=mysqli_query($conn,$strSQL); // creo la query, la query si chiama mysqli_query e richiama i valori in parentesi


                  $numRecord=mysqli_num_rows($query); // la variabile piglia le rows e si basa sulla query
                  for ($i=1; $i<=$numRecord; $i++)
                  {
                    $row=mysqli_fetch_assoc($query); //la variabile row richiama la query
                    $articoloID=$row['ArticoloID'];
                    $aliquotaIva=$row['AliquotaIva'];
                    echo("<tr>
                    <td>".$articoloID."</td>
                    <td>".$aliquotaIva."</td>
                    </tr>");

                  }


    //creare una pagina php che visualizza la lista degli articoli utilizzando il for anzichè il file.
    ?>
  </table>

  <table border=1px>
    <tr>
      <td>ID</td>
      <td>Aliquota IVA</td>
    </tr>


  <?php

  $conn=mysqli_connect(localhost,"stefanophp7", "3pasquaman3", "my_stefanophp7"); // creo la connessione
  $strSQL="SELECT * FROM TArticoli ORDER BY ArticoloID"; // determino la stringa sql

  $query=mysqli_query($conn,$strSQL); // creo la query, la query si chiama mysqli_query e richiama i valori in parentesi


                $numRecord=mysqli_num_rows($query); // la variabile piglia le rows e si basa sulla query
                while($row= mysqli_fetch_assoc($query))
                {
                  $row=mysqli_fetch_assoc($query); //la variabile row richiama la query
                  $articoloID=$row['ArticoloID'];
                  $aliquotaIva=$row['AliquotaIva'];
                  echo("<tr>
                  <td>".$articoloID."</td>
                  <td>".$aliquotaIva."</td>
                  </tr>");

                }


  //creare una pagina php che visualizza la lista degli articoli utilizzando il for anzichè il file.
  ?>
</table>
  </body>
</html>
