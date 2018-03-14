<!DOCTYPE html>

<html>
<head>
    <!-- Title and meta tag -->
    <title>Conecction Store - Orden de Trabajo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  
    <!-- StyleSheets -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    
</head>
<body>

	<div class="container">
    <div class="row">
        <div class="col-md-12">
		<a href="/tabla_online.php">base de datos</a>
            <div class="well well-sm">
                <form class="form-horizontal" id="formulario">
                    <fieldset>
                        <legend class="text-center header">Orden de Trabajo</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                            <label for="nroOrden">Numero de Orden</label>
                                <input id="nroOrden" name="nroOrden" type="text" value="" placeholder="Nro de Orden" onkeypress='validate(event)' class="form-control" required disabled>
								<p class="help-block"></p>
							</div>
                        </div>
						
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                            <label for="name">Nombre del Cliente</label>
                                <input id="nombreCliente" name="name" type="text" placeholder="Nombre del Cliente" class="form-control" required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
							<div class="col-md-8">
							<label for="rutCliente">RUT del Cliente</label>
                                <input type="text" id="rutCliente" name="rutCliente" class="form-control" required oninput="checkRut(this)" placeholder="RUT del Cliente">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
							<label for="telefonoCliente">Telefono del Cliente</label>
                                <input id="telefonoCliente" name="telefono" type="text" placeholder="Telefono del Cliente" onkeypress='validate(event)' class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
						<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
						  <div class="col-md-8">
						  <label for="marcaEquipo">Seleccione marca del equipo</label>
						  <select class="form-control" id="marcaEquipo" required>
							<option selected disabled hidden value="">Selecciona la marca del Equipo</option>
							<option>Apple</option>
							<option>Samsung</option>
							<option>Sony</option>
							<option>LG</option>
							<option>HTC</option>
							<option>Huawei</option>
							<option>Lenovo</option>
							<option>Motorola</option>
							<option>Xiaomi</option>
							<option>Otro (especifique mas detalles abajo)</option>
						  </select>
						  </div>
						</div>
						
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
							<label for="modeloEquipo">Ingrese modelo del equipo</label>
                                <input id="modeloEquipo" name="equipo" type="text" placeholder="Modelo del equipo a reparar" class="form-control" required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
							<label for="colorEquipo">Ingrese color del equipo</label>
                                <input id="colorEquipo" name="colorequipo" type="text" placeholder="Ingrese color de pantalla" class="form-control" required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
							<label for="fechaEntrega">Ingrese fecha de posible entrega</label>
                                <input id="fechaEntrega" type="text" onfocus="(this.type='date')" step="1" min="<?php echo date("Y-m-d");?>" placeholder="Posible Fecha Entrega" class="form-control" required>
                            </div>
                        </div>
						
						<div class="form-group">
						<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
						  <div class="col-md-8">
						  <label for="fallaEquipo">Seleccione falla del equipo</label>
						  <select class="form-control" id="fallaEquipo" required>
							<option selected disabled hidden value="">Selecciona problema del equipo</option>
							<option>LCD</option>
							<option>Tactil</option>
							<option>GLASS</option>
							<option>Pin de Carga</option>
							<option>Revision</option>
							<option>Flex Volumen</option>
							<option>Flex Home</option>
							<option>Flex Encendido</option>
							<option>Flex Camara</option>
							<option>Baño Quimico</option>
							<option>Enderezar Housing</option>
							<option>Cambio Bateria</option>
							<option>Cuenta Google</option>
							<option>Flex camara frontal</option>
							<option>Auricular</option>
							<option>Parlante</option>
							<option>Sensor de proximidad</option>
							<option>Microfono</option>
							<option>Wifi</option>
							<option>Antena</option>
							<option>Otro (especifique mas detalles abajo)</option>
						  </select>
						  </div>
						</div>
						
						<div class="form-group">
						<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
						  <div class="col-md-8">
						  <label for="sim_microsd">Usuario deja el SIM/MicroSD?</label>
						  <select class="form-control" id="sim_microsd" required>
							<option selected disabled hidden value="">Selecciona Opción</option>
							<option>SI</option>
							<option>NO</option>
						  </select>
						  </div>
						</div>
						
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
						  <label for="IMEI">Ingrese IMEI del equipo</label>
                                <input id="IMEI" name="IMEI" type="text" placeholder="IMEI" onkeypress='validate(event)' class="form-control" required maxlength=15 minlength=15>
								<p class="help-block"></p>
							</div>
                        </div>
						
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
						  <label for="patronCodigo">Ingrese la clave de desbloqueo del telefono</label>
                                <input id="patronCodigo" name="patronCodigo" type="text" placeholder="Ingresa PIN o metodo de desbloqueo" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
						  <label for="detalleOrden">Ingrese mas detalles sobre la orden de trabajo.</label>
                                <textarea class="form-control" id="detalleOrden" name="message" placeholder="Ejemplo: Se entrega telefono son pantalla rota y detalles en la parte trasera" rows="7" required></textarea>
                            </div>
                        </div>
						
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
							<label for="valorReparacion">Ingrese valor total de la reparacion</label>
                                <input id="valorReparacion" name="valorReparacion" type="text" placeholder="Valor Total de la Reparacion" onkeypress='validate(event)' oninput="calculate()" class="form-control" required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
							<label for="abono">Ingresa valor de abono</label>
                                <input id="abono" name="abono" type="text" placeholder="(si no abona ingrese 0)" onkeypress='validate(event)' oninput="calculate()" class="form-control" required>
                            </div>
                        </div>
						
						<div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
							<label for="totalPagar">TOTAL A PAGAR CUANDO RETIRE</label>
                                <input id="totalPagar" name="totalPagar" type="text" placeholder="Total a pagar cuando retire" class="form-control" disabled>
                            </div>
                        </div>
						
						<div class="col-md-12 text-center">
                                <button type="submit" id="boton_enviar" class="btn btn-primary btn-lg">Imprimir</button>
                        </div>
						
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="/js/jqBootstrapValidation.js"></script>
<script>
//script para solo numeros
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

//Detecta el envio del form
$('#formulario').submit(function () {
 enviar_form();
 return false;
});


//script que manda a imprimir todo
function enviar_form ()
{
	
	ultima_boleta();
	
	var parametros = {
			"nroOrden" : $("#nroOrden").val(),
			"nombreCliente" : $("#nombreCliente").val(),
			"rutCliente" : $("#rutCliente").val(),
			"telefonoCliente" : $("#telefonoCliente").val(),
			"marcaEquipo" : $("#marcaEquipo :selected").text(),
			"modeloEquipo" : $("#modeloEquipo").val(),
			"colorEquipo" : $("#colorEquipo").val(),
			"fallaEquipo" : $("#fallaEquipo :selected").text(),
			"fechaEntrega" : $("#fechaEntrega").val(),
			"sim_microsd" : $("#sim_microsd :selected").text(),
			"IMEI" : $("#IMEI").val(),
			"patronCodigo" : $("#patronCodigo").val(),
			"detalleOrden" : $("#detalleOrden").val(),
			"valorReparacion" : $("#valorReparacion").val(),
			"abono" : $("#abono").val(),
			"totalPagar" : $("#totalPagar").val(),
			"estado_reparacion" : 1
	};
	
	enviar_datos_web(parametros);
	
	//con esto deberia comprobar primero si se guardo en internet antes de imprimir :)
	
	imprimir(parametros);
	imprimir(parametros);
	//imprimir_guarda(parametros);
	
	alert("Las dos Boletas Han Sido Impresas Con Exito");
	
	
		
		//location.reload();
        
}
//funcion para calcular el total a pagar
function calculate() {
	var myBox1 = document.getElementById('valorReparacion').value;	
	var myBox2 = document.getElementById('abono').value;
	var result = document.getElementById('totalPagar');	
	var myResult = myBox1 - myBox2;
	result.value = myResult;
}

//validador de rut
function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}

//Imprime boleta
function imprimir(parametros)
{
	$.ajax({
		data:  parametros,
		url:   'windows-usb.php',
		type:  'post',
		beforeSend: function () {
			
		},
		success:  function (response) {
		}
	});
}

//imprime boleta y guarda ANTIGUO
function imprimir_guarda(parametros)
{
	$.ajax({
		data:  parametros,
		url:   'windows-usb-guarda.php',
		type:  'post',
		beforeSend: function () {
			
		},
		success:  function (response) {
		}
	});
}


//Guarda los datos en la web
function enviar_datos_web(parametros)
{
	var jqxhr = $.ajax({
		url: 'https://connectionstore.cl/service/set_reparacion',
		data: parametros,
		type: 'POST',
		dataType: 'json'
	})
	.done(function(data) 
	{
		alert (" La Información ha quedado almacenada en internet :) ");
		location.reload();
	})
	.fail(function() 
	{
		alert (" La Información ¡NO! ha quedado almacenada en internet :( ");
		alert (" La Información ¡NO! ha quedado almacenada en internet :( ");
		alert (" Verifica la Conección a Internet Porfavor :) ");
		location.reload();
	})
	.always(function() 
	{
		// alert( "complete" );
	});
}

//trae el ultimo nro de boleta
function ultima_boleta()
{	
	var jqxhr = $.ajax({
		url: 'https://connectionstore.cl/service/get_last_id',
		type: 'POST',
		dataType: 'json'
	})
	.done(function(data) 
	{
		dato1 = parseInt(data.datos["0"].nroBoleta);
		suma = dato1 + 1;
		$('#nroOrden').val(suma);
	})
	.fail(function() 
	{
		alert (" La Información ¡NO! quedado almacenada en internet :( ");
		alert (" La Información ¡NO! quedado almacenada en internet :( ");
		alert (" Verifica la Conección a Internet Porfavor :) ");
		location.reload();
	})
	.always(function() 
	{
		
	});
}

// ON LOAD
$(document).ready(function() {
	// Ajax de una a lo choro mota para tener el ultimo id de la boleta
	ultima_boleta();
});

</script>
</body>
</html>
