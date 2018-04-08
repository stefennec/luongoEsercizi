<html>

<head>
<title>Lista Dipendenti</title>
</head>
<body>

<table border="1">
<tr>
  <td>DipenteID</td>
  <td>Nome</td>
  <td>Cognome</td>
</tr>

<?php //apro il php


$conn=mysqli_connect(localhost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
 $strSQL="SELECT DipendenteID, Nome,Cognome FROM TDipendenti ORDER BY DipendenteID";
              $query= mysqli_query($conn,$strSQL);
              while($row= mysqli_fetch_assoc($query))
              {

                  //in questo caso apro la grafa, e digito echo, echo chiede al php di "stampare sulla pagina"

                  //php differenzia tra stringhe e numeri, poi si sono pure le variabili.
				//i markup di html sono stringhe, quindi vanno virgolettati,finito un ordine php si chiude con ;
                //segue la concatenazione delle variabili, si fa con il punto   .
                // in questo caso echo printa le variabili $row i cui valori richiamati dal database Mysql
                //i dati printati vengono esposti dentro i markup html.

                  echo("<tr>
                          <td>".$row[DipendenteID]."</td>
                          <td>".$row[Nome]."</td>
                          <td>".$row[Cognome]."</td>
  						            <td><a href=DettaglioDipendenti.php?DipendenteID=".$row[DipendenteID].">Dettagli</a></td>

                        </tr>");
              }
              mysqli_close($conn);

             //chiudo il PHP
          ?>



</table>

</body>
</html>
