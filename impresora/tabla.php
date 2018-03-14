<?php
//aqui guardamos los datos de la boleta en la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "connection_store";
$db_nroBoleta = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<html>
<head>
    <!-- Title and meta tag -->
    <title>Conecction Store - Orden de Trabajo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  
    <!-- StyleSheets -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>
	<!-- StyleSheets -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
 
	
    
</head>
<body>
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="container">
<div class="row">
  <div class="col-md-12 " style="margin-top: 20px">
	<table id="tabla_personas" class="table table-bordered table-condensed table-striped">
<thead>
  <tr>
    <th>Numero Orden</th>
    <th>Fecha Entrega</th>
    <th>Nombre</th> 
    <th>Rut</th>
    <th>Marca Equipo</th>
    <th>Modelo Equipo</th>
    <th>Falla Equipo</th>
    <th>IMEI</th>
    <th>Valor Reparacion</th>
    <th>Abono</th>
    <th>TOTAL A PAGAR</th>
  </tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM `boleta_reparaciones` ORDER BY `sim_microsd` DESC";
$result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['nroBoleta']?></td>
                    <td><?php $fechaEntrega = date("d-m-Y", strtotime($row['fechaEntrega'])); echo $fechaEntrega?></td>
                    <td><?php echo $row['nombreCliente']?></td>
                    <td><?php echo $row['rutCliente']?></td>
					<td><?php echo $row['marcaEquipo']?></td>
                    <td><?php echo $row['modeloEquipo']?></td>
                    <td><?php echo $row['fallaEquipo']?></td>
                    <td><?php echo $row['imei']?></td>
                    <td><?php echo $row['valorReparacion']?></td>
                    <td><?php echo $row['abono']?></td>
                    <td><?php echo $row['totalPagar']?></td>
                </tr>

            <?php
            }
            ?>   
</tbody>
</table>
  </div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
<script>

	$('#tabla_personas').DataTable( {
		paging: false,
		scrollX:true,
		fixedHeader: true,
		scrollY: 300,
		"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
	});

</script>
</body>
</html>