<?php
echo ('1');
$conn=mysqli_connect(localhost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
$strSQL="SELECT * FROM TArticoli ORDER BY ArticoloID";
echo ('2');
$query=mysqli_query($conn,$strSQL);
echo ('3');

              $numRecord=mysqli_num_rows($query);
              for ($i=1; $i<=$numRecord; $i++)
              {
                $row=mysqli_fetch_assoc($query);
                $articoloID=$row['ArticoloID'];
                echo($articoloID);
                echo('<br>');
              }


//creare una pagina php che visualizza la lista degli articoli utilizzando il for anzichè il file.
?>
