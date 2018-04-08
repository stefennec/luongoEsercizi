<?php

$conn=mysqli_connect(localhost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
$strSQL="SELECT * FROM TArticoli ORDER BY ArticoloID";

$query=mysqli_query($conn,$strSQL);


              $numRecord=mysqli_num_rows($query);
              for ($i=1; $i<=$numRecord; $i++)
              {
                $row=mysqli_fetch_assoc($query);
                $articoloID=$row['ArticoloID'];
                echo($articoloID);
                echo('<br>');
              }



?>
