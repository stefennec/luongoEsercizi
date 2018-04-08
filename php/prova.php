<html>

<head>
<title>Lista Articoli</title>
</head>
<body>

<table border="1">
<tr>
  <td>ArticoloID</td>
  <td>Nome</td>
  <td>Descrizione</td>
  <td>Prezzo Unitario</td>
  <td>Giacenza</td>
  <td>Aliquota IVA</td>
</tr>

<?php
$conn=mysqli_connect(localhost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
$strSQL="select * from TArticoli";
$query=mysqli_query($conn,$strSQL);
while($row=mysqli_fetch_assoc($query))
{ ?>

<tr>
  <td><?php echo($row["ArticoloID"])?></td>
  <td><?php echo($row["Nome"])?></td>
  <td><?php echo($row["Descrizione"])?></td>
  <td><?php echo number_format($row["PrezzoUnitario"],2)?></td>
  <td><?php echo($row["Giacenza"])?></td>
  <td><?php echo($row["AliquotaIva"])?>%</td>
</tr>
<?php
}
mysqli_close($conn);
?>

</table>

</body>
</html>
