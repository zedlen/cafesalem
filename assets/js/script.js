var table_id=0;
function imprimir(){
	if (table_id!=0) {
		alertify.confirm('Cerrar ticket', '¿Seguro que desea finalizar este pedido? Una vez hecho esto no se podra editar el ticket', 
			function(){ 
				alertify.set('notifier','position', 'top-left');
				alertify.success('Ok')
				var mywindow = window.open('', 'PRINT');

				    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
				    mywindow.document.write('</head><body >');
				    mywindow.document.write('<h1>' + document.title  + '</h1>');
				    mywindow.document.write(document.getElementById('ticket').innerHTML);
				    mywindow.document.write('</body></html>');

				    mywindow.document.close(); // necessary for IE >= 10
				    mywindow.focus(); // necessary for IE >= 10*/

				    mywindow.print();
				    mywindow.close(); 
				$.ajax({
					type: "post",
					url: base_url+'index.php/Welcome/apiConecction',
					data:{
					  url:'ticket/closeTicket',
					  table_id:table_id,
					  formaPago:"EFECTIVO",
					  total:$("#total_ticket").html(),
					  empleado:$("#employee_select :selected").val()
					},
					dataType: "json", 
					success: function(response)
					{
						if (response.status) {
							
							$("#ticket_datail").html('')
							$("#total_ticket").html('0')
						}
						else{
							alertify.alert("Error","Error al cerrar ticket. <br> Error : "+response.message);
						}
					},
					failure:function(a,b,c) {
					  alertify.alert("Error","Error al cerrar ticket. <br> Error : "+b);
					},
					error:function(a,b,c) {
					  alertify.alert("Error","Error al cerrar ticket. <br> Error : "+b);
					}
				})				
			}, 
			function(){ 
				alertify.set('notifier','position', 'top-left');
				alertify.warning('Cierre de ticket cancelado')
			}
		);
	}
	else{
		alertify.alert("No hay mesa","No se ha selecionado una mesa para generar ticket")
	}
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
									"<td id='total_"+value.Producto+"'>"+sub_total+"</td>"+
									"<td><button id='edit_button_"+value.Producto+"' producto_id='"+value.Producto+"' type='button' class='btn btn-default' onclick='edit_ticket("+value.Producto+")'>"+
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
function edit_ticket(id) {
	var cant=0;
	var cancel=false
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
				var totol_old=parseFloat($("#total_ticket").html())
				var prize_old=parseFloat($("#total_"+id).html())
				var cant_old=parseFloat($("#cant_"+id).html())
				var unit_prize=prize_old/cant_old
				var new_total=(totol_old - prize_old)+(unit_prize*cant)				
				$.ajax({
					type: "post",
					url: base_url+'index.php/Welcome/apiConecction',
					data:{
					  url:'ticket/editTicket',
					  table_id:table_id,
					  cant:cant,
					  total:unit_prize*cant,
					  producto:id
					},
					dataType: "json", 
					success: function(response)
					{
						if (response.status) {
							$("#cant_"+id).html(cant)
							$("#total_"+id).html(unit_prize*cant)
							$("#total_ticket").html(new_total)						
						}
						else{
							alertify.alert("Error","Error al editar cantidad de producto. <br> Error : "+response.message);
						}
					},
					failure:function(a,b,c) {
					  alertify.alert("Error","Error al editar cantidad de producto. <br> Error : "+b);
					},
					error:function(a,b,c) {
					  alertify.alert("Error","Error al editar cantidad de producto. <br> Error : "+b);
					}
				})
			}
		}, 
		function() { 
			cancel=true;
			alertify.set('notifier','position', 'top-left');
 			alertify.warning('No se ha editado la catidad del producto');
		}).set('type','number');
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
								var total=parseFloat($("#total_ticket").html())
								total=total+prize
								$("#total_ticket").html(total)
								$("#ticket_datail").append("<tr><td>"+$("#"+id).attr('obj_name')+"</td><td id='cant_"+producto+"'>"+cant+"</td><td id='total_"+producto+"'>"+prize+"</td>"+
									"<td><button id='edit_button_"+producto+"' producto_id='"+id+"' type='button' class='btn btn-default' onclick='edit_ticket("+producto+")'>"+
											"<span class='glyphicon glyphicon-edit'></span>"+
									"</button></td></tr></tr>")							
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
			}).set('type','number');		
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
								var total=parseFloat($("#total_ticket").html())
								total=total+prize
								$("#total_ticket").html(total)
								$("#ticket_datail").append("<tr><td>"+$("#"+id).attr('obj_name')+"</td><td id='cant_"+producto+"'>"+cant+"</td><td id='total_"+producto+"'>"+prize+"</td>"+
									"<td><button id='edit_button_"+producto+"' producto_id='"+producto+"' type='button' class='btn btn-default' onclick='edit_ticket("+producto+")'>"+
											"<span class='glyphicon glyphicon-edit'></span>"+
									"</button></td></tr></tr>")	
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
			}).set('type','number');		
	}
})