<?php
date_default_timezone_set('America/Santiago');
$fecha = date('d/m/Y - H:i:s');
$fechaSQL = date('Y-m-d H:i:s');
//Nro Orden
$nroOrden = $_POST['nroOrden'];
// Nombre Cliente
$nombreCliente = $_POST['nombreCliente'];
//Rut
$rutCliente = $_POST['rutCliente'];
//Nro Telefonico cliente
$telefonoCliente = $_POST['telefonoCliente'];
// marca telefono cliente
$marcaEquipo = $_POST['marcaEquipo'];
// modelo Equipo
$modeloEquipo = $_POST['modeloEquipo'];
// color equipo
$colorEquipo = $_POST['colorEquipo'];
// falla equipo
$fallaEquipo = $_POST['fallaEquipo'];
//fecha entrega
$fechaEntrega = $_POST['fechaEntrega'];

//IMEI
$IMEI = $_POST['IMEI'];
//DEJA MICRO SD SIM
$sim_microsd = $_POST['sim_microsd'];
// Patron Codigo
$patronCodigo = $_POST['patronCodigo'];
//detalle orden
$detalleOrden = $_POST['detalleOrden'];
// valor reparacion
$valorReparacion = $_POST['valorReparacion'];
// abono
$abono = $_POST['abono'];
// total a pagar
$totalPagar = $_POST['totalPagar'];
// estado_reparacion
$estado_reparacion = $_POST['estado_reparacion'];

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

$sql = "INSERT INTO boleta_reparaciones (fecha, nombreCliente, rutCliente, telefonoCliente, marcaEquipo, modeloEquipo, colorEquipo, fallaEquipo, fechaEntrega, sim_microsd, imei, patronCodigo, detalleOrden, valorReparacion, abono, totalPagar, estado_reparacion)
VALUES ('$fechaSQL', '$nombreCliente', '$rutCliente', '$telefonoCliente', '$marcaEquipo', '$modeloEquipo', '$colorEquipo', '$fallaEquipo', '$fechaEntrega', '$sim_microsd', '$IMEI', '$patronCodigo', '$detalleOrden', '$valorReparacion', '$abono', '$totalPagar', '$estado_reparacion')";

$conn->query($sql);

$conn->close();

//formato para la impresora
$fechaEntrega = date("d-m-Y", strtotime($fechaEntrega));
$valorReparacion = number_format($valorReparacion, 0, "", ".");
$abono = number_format($abono, 0, "", ".");
$totalPagar = number_format($totalPagar, 0, "", ".");

/* Change to the correct path if you copy this example! */
require __DIR__ . '/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

try {
    // Enter the share name for your USB printer here
    $connector = new WindowsPrintConnector("POS-58");

    $printer = new Printer($connector);
	/* Initialize */
    /* Information for the receipt */
	$printer -> setFont(Printer::FONT_B);
	$printer -> setJustification(Printer::JUSTIFY_CENTER);
	$printer -> setTextSize(2, 1);
	$tux = EscposImage::load("Logo.png", false);
    $printer -> bitImage($tux);
	$printer -> setFont(Printer::FONT_A);
	$printer -> setTextSize(1, 1);
	$printer -> text("O'higgins 400 - Local 14\n");
	$printer -> text("LOS ANDES\n");
	$printer -> text("Tel: 34 2 203464\n");
	$printer -> text("Wsp: +56968574703\n");
	$printer -> text("--------------------------------\n");
	$printer -> text("RECEPCION DE EQUIPO\n");
	$printer -> text("--------------------------------\n");
	$printer -> text("Orden de trabajo Nro: $nroOrden \n");
	$printer -> text("Fecha: $fecha \n");
	$printer -> text("--------------------------------\n");
	$printer -> setFont(Printer::FONT_B);
	$printer -> text("Cliente: $nombreCliente \n");
	$printer -> text("RUT: $rutCliente \n");
	$printer -> text("Telefono: $telefonoCliente \n");
	$printer -> text("------------------------------------------\n");
	$printer -> setJustification(Printer::JUSTIFY_LEFT);
	$printer -> setFont(Printer::FONT_A);
	$printer -> text("  Marca: $marcaEquipo \n");
	$printer -> text(" Modelo: $modeloEquipo \n");
	$printer -> text("  Color: $colorEquipo \n");
	$printer -> text("  Falla: $fallaEquipo \n");
	$printer -> text("Entrega: $fechaEntrega \n");
	$printer -> text("   IMEI: $IMEI \n");
	$printer -> text("  Clave: $patronCodigo \n");
	$printer -> text("SIM/mSD: $sim_microsd \n");
	$printer -> setFont(Printer::FONT_B);
	$printer -> text("------------------------------------------\n");
	$printer -> setJustification(Printer::JUSTIFY_CENTER);
	$printer -> text("Descripcion del Problema\n");
	$printer -> text("------------------------------------------\n");
	$printer -> text("$detalleOrden \n");
	$printer -> text("------------------------------------------\n");
	$printer -> setJustification(Printer::JUSTIFY_LEFT);
	$printer -> setFont(Printer::FONT_A);
	$printer -> text("Valor Reparacion  :$$valorReparacion.-\n");
	$printer -> text("Abono             :$$abono.-\n");
	$printer -> setTextSize(1, 2);
	$printer -> text("Total a Pagar     :$$totalPagar.-\n\n");
	$printer -> setTextSize(1, 1);
	$printer -> setFont(Printer::FONT_B);
	$printer -> text("NOTA\n");
	$printer -> text("====\n");
	$printer -> text("Los trabajos deben ser retirados en un plazo no mayor a 30 dias. Los trabajos retirados posteriormente a los 30 dias se cobraran un recargo de 500 pesos diarios por concepto de bodegaje\n\n");
	$printer -> text("Los productos rayados, sellos rotos o con signo de golpes seran rechazados por garantia debidos a que estos afectan directamente el buen funcionamiento del repuesto\n\n");
	$printer -> text("Autorizo yo ____________________________\n");
	$printer -> text("A Connection Store para que intervenga el equipo que aqui se detalla con el fin de efectuar la revision o reparacion y declaro ser propietario o el portador autorizado del dispositivo y ser responsable de su uso o procedencia\n");
	$printer -> setJustification(Printer::JUSTIFY_CENTER);
	$printer -> text("\n\n");
	$printer -> text("________________________\n");
	$printer -> text("Firma de Aprobacion \n");
	$printer -> text("\n\n");
	$printer -> text("________________________\n");
	$printer -> text("Firma de Recepcion \n\n");
	$printer -> text("GRACIAS POR SU PREFERENCIA\n\n\n\n");
	
	

    $printer -> close();
	
	
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}