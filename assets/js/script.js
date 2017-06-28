var table_id=0;
function imprimir(){
	alertify.confirm('Cerrar ticket', '¿Seguro que desea finalizar este pedido? Una vez hecho esto no se podra editar el ticket', 
		function(){ 
			alertify.success('Ok') 
		}, 
		function(){ 
			alertify.error('Cancel')
		}
	);
}

$(".select_category").change(function() {
	var value = $(this).val()
	if ($(this).hasClass('drink')) {
		if (value!=0) {
			$(".drinks").fadeOut()
			$(".drink_category_"+value).fadeIn()
		}
		else{
			$(".drinks").fadeIn()
		}
	}
	else{
		if (value!=0) {
			$(".foods").fadeOut()
			$(".food_category_"+value).fadeIn()
		}
		else{
			$(".foods").fadeIn()
		}
	}
})

$(".table_radio").click(function() {
	table_id=$(this).val()
	$.ajax({
		type: "post",
		url: base_url+'index.php/Welcome/apiConecction',
		data:{
		  url:'ticket/getOpenTicketForTable',
		  table_id:table_id
		},
		dataType: "json", 
		success: function(response)
		{
			if (response.status) {
				console.log(response);
				var total=0
				$("#ticket_datail").html('')
				$.each(response.ticket.Detalle,function(index,value) {
					var sub_total=value.Cantidad*value.Precio;
					var new_detail="<tr>"+
									"<td>"+value.Nombre+"</td>"+
									"<td id='cant_"+value.Producto+"'>"+value.Cantidad+"</td>"+
									"<td>"+sub_total+"</td>"+
									"<td><button producto_id='"+value.Producto+"' type='button' class='btn btn-default'>"+
											"<span class='glyphicon glyphicon-edit'></span>"+
									"</button></td></tr>"
					total=total+sub_total
					$("#ticket_datail").append(new_detail);
				})
				$("#total_ticket").html(total)

				
			}
		},
		failure:function(a,b,c) {
		  alertify.alert("Error","Error al obtener ticket abierto de la mesa. <br> Error : "+b);
		},
		error:function(a,b,c) {
		  alertify.alert("Error","Error al obtener ticket abierto de la mesa. <br> Error : "+b);
		}
	})
})
function isInt(value) {
  return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value))
}

$(".foods").click(function() {
	if (table_id==0) {
		alertify.alert('Error','Seleccione una mesa primero')
	}
	else{
		var cant=0
		var cancel=false
		var id=$(this).attr('id')
		alertify.prompt( 
			'Cantidad', 
			'Ingrese cantidad', 
			'', 
			function(evt, value) { 
				if (isInt(value)) {
					cant=value;
				} 
				else{
					cancel=true
					alertify.alert('Error','Debes agregar la cantidad del producto')

				}
				if (!cancel) {
					var sub_prize=parseFloat($("#"+id).attr('prize'))			
					var prize =sub_prize*parseInt(cant);
					var producto=$("#"+id).attr('producto_id')
					$.ajax({
						type: "post",
						url: base_url+'index.php/Welcome/apiConecction',
						data:{
						  url:'ticket/addTicketDetail',
						  table_id:table_id,
						  cant:cant,
						  prize:prize,
						  producto:producto
						},
						dataType: "json", 
						success: function(response)
						{
							if (response.status) {
								$("#ticket_datail").append("<tr><td>"+$("#"+id).attr('obj_name')+"</td><td>"+cant+"</td><td>"+prize+"</td></tr>")							
							}
							else{
								alertify.alert("Error","Error al agregar producto a ticket. <br> Error : "+response.message);
							}
						},
						failure:function(a,b,c) {
						  alertify.alert("Error","Error al agregar producto a ticket. <br> Error : "+b);
						},
						error:function(a,b,c) {
						  alertify.alert("Error","Error al agregar producto a ticket. <br> Error : "+b);
						}
					})
					
				}
			}, 
			function() { 
				cancel=true;
				alertify.alert('Error','Debes agregar la cantidad del producto')
			});
		
		
	}	
})
$(".drinks").click(function() {
	if (table_id==0) {
		  alertify.alert('Error','Seleccione una mesa primero')
	}
	else{
		var cant=0
		var cancel=false
		var id=$(this).attr('id')
		alertify.prompt( 
			'Cantidad', 
			'Ingrese cantidad', 
			'', 
			function(evt, value) { 
				if (isInt(value)) {
					cant=value;
				} 
				else{
					cancel=true
					alertify.alert('Error','Debes agregar la cantidad del producto')
				}
				if (!cancel) {
					var sub_prize=parseFloat($("#"+id).attr('prize'))
					var prize =sub_prize*parseInt(cant);
					var producto=$("#"+id).attr('producto_id')
					$.ajax({
						type: "post",
						url: base_url+'index.php/Welcome/apiConecction',
						data:{
						  url:'ticket/addTicketDetail',
						  table_id:table_id,
						  cant:cant,
						  prize:prize,
						  producto:producto
						},
						dataType: "json", 
						success: function(response)
						{
							if (response.status) {
								$("#ticket_datail").append("<tr><td>"+$("#"+id).attr('obj_name')+"</td><td>"+cant+"</td><td>"+prize+"</td></tr>")							
							}
							else{
								alertify.alert("Error","Error al agregar producto a ticket. <br> Error : "+response.message);
							}
						},
						failure:function(a,b,c) {
						  alertify.alert("Error","Error al agregar producto a ticket. <br> Error : "+b);
						},
						error:function(a,b,c) {
						  alertify.alert("Error","Error al agregar producto a ticket. <br> Error : "+b);
						}
					})
				}
			}, 
			function() { 
				cancel=true;
				alertify.alert('Error','Debes agregar la cantidad del producto')
			});
		
		
		
	}
})