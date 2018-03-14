<html>
<head>
    <!-- Title and meta tag -->
    <title>Conecction Store - Orden de Trabajo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  
    <!-- StyleSheets -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
	<!-- StyleSheets -->

 
	
    
</head>
<body>
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="container-fluid">
<div class="row">
	<div class="col-md-12 " style="margin-top: 20px">
		<table id="tabla_personas" class="table table-bordered table-condensed table-striped">
			<thead>
			  <tr>
				<th>Estado Orden</th>
				<th>Numero Orden</th>
				<th>Fecha Entrega</th>
				<th>Nombre</th>
				<th>RUT</th>
				<th>Telefono</th>
				<th>Equipo</th>
				<th>Falla Equipo</th>
				<th>IMEI</th>
				<th>Valor Repa</th>
				<th>Abono</th>
				<th>A Pagar</th>
			  </tr>
			</thead>
		</table>
	</div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="datatables/datatables.min.js"></script>
<script>

	var table = $('#tabla_personas').DataTable( {
		ajax: 
	    {
	        url: "https://connectionstore.cl/service/get_all",
	        dataSrc: 'datos'	    
	    },
	    columns: 
	    [
	    	//estado reparacion
			{ 
				data: 'estado_reparacion',
				render: function ( data, type, row, meta ) 
	        	{
					switch (data) 
					{
						case "0":
							data = "Antiguo";
							break;
						case "1":
							data = '<select class="form-control select_estado" id="estadoEquipo_'+ row.nroBoleta +'">'+
							'<option value="1" selected>En Reparación</option>'+
							'<option value="2">Reparado</option>'+
							'<option value="3">Entregado</option>'+
						  '</select>';
							break;
						case "2":
							data = '<select class="form-control select_estado" id="estadoEquipo_'+ row.nroBoleta +'">'+
							'<option value="1">En Reparación</option>'+
							'<option value="2" selected>Reparado</option>'+
							'<option value="3">Entregado</option>'+
						  '</select>';
							break;
						case "3":
							data = '<select class="form-control select_estado" id="estadoEquipo_'+ row.nroBoleta +'">'+
							'<option value="1">En Reparación</option>'+
							'<option value="2">Reparado</option>'+
							'<option value="3" selected>Entregado</option>'+
						  '</select>';
							break;
					}
					
					return data;
			    }
			},
			//nroBoleta
	        { data: 'nroBoleta' },
			//FechaEntrega
			{ 
				data: 'fechaEntrega',
				render: function ( data, type, row, meta ) 
	        	{
					data = new Date(data);
					data = data.toLocaleString('en-GB') 
					data = data.substr(0, data.length-10); 
					return data;
			    }
			},
			//nombreCliente
			{ 
				data: 'nombreCliente',
				render: function ( data, type, row, meta ) 
	        	{
					data = data.toLowerCase().replace(/\b[a-z]/g, function(letter) {
						return letter.toUpperCase();
					});
					return data;
			    }
			},
			//rutCliente
			{ data: 'rutCliente' },
			//Telefono
			{ data: 'telefonoCliente' },
			//marcaEquipo
			{ 
				data: 'marcaEquipo',
				render: function ( data, type, row, meta ) 
	        	{
					if ( data == "Otro (especifique mas detalles abajo)")
					{
						data = row.modeloEquipo;
						return data;
					}
					else
					{
						data = data + " " + row.modeloEquipo;
						return data;
					}
					
			    }
			},
			//fallaEquipo
			{ 
				data: 'fallaEquipo' ,
				render: function ( data, type, row, meta ) 
	        	{
					if ( data == "Otro (especifique mas detalles abajo)")
					{
						data = row.detalleOrden;
						return data;
					}
					else
					{
						data = data + " " + row.modeloEquipo;
						return data;
					}
					
			    }
			},
			//IMEI
			{ data: 'imei' },
			//VALOR
			{ data: 'valorReparacion' },
			//ABONO
			{ data: 'abono' },
			//T A PAGAR
			{ data: 'totalPagar' },
    	],
		paging: false,
		scrollX:true,
		fixedHeader: true,
		scrollY: 500,
		"language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
		dom: 'Bfrtip',
		buttons: [
			{
				extend: 'excelHtml5',
				text: 'Exportar a Excel'
			}
		]
	});
	
	//funcion que ejecuta el ajax
	function editar_reparacion_web(parametros)
	{
		var jqxhr = $.ajax({
			url: 'https://connectionstore.cl/service/update_estado',
			data: parametros,
			type: 'POST',
			dataType: 'json'
		})
		.done(function(data) 
		{
			alert (" La Información ha quedado almacenada en internet :D ");
			table.ajax.reload();
			alert (" La Información ha sido recargada :) ");
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
	
	//READY
	
	$(document).ready(function () {
		
		$('.buttons-excel').removeClass('btn-default').addClass('btn-success');
		//Deteccion ONCHANGE select estado reparacion
		$('#tabla_personas tbody').on('change', '.select_estado', function () {
			
			// se obtienen los datos de la tabla
			var data = table.row($(this).parents('tr')).data();
			
			//se crea array con los parametros
			var parametros = {
			"nroBoleta" : data["nroBoleta"],
			"rutCliente" : data["rutCliente"],
			"estado_reparacion" : $('#estadoEquipo_'+ data["nroBoleta"]).val()
			};
			
			//llamamos la funcion que ejecuta el ajax
			editar_reparacion_web(parametros);
			
		})
		
	})

</script>
</body>
</html>