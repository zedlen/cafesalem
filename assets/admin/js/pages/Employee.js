var id_empleado=0;

$('#form_validation').validate({
    highlight: function (input) {
        $(input).parents('.form-line').addClass('error');
    },
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});
function addEditEmployee(id) {
	id_empleado=id
	if (id!=0) {	
		$('#employeeModal').modal('show')
		$("#nombre").val($("#nombre_"+id).html())
		$("#aPaterno").val($("#aPaterno_"+id).html())
		$("#aMaterno").val($("#aMaterno_"+id).html())
		$('#curp').val($("#curp_"+id).html())
		$("#genero").val($("#genero_"+id).html())
		$("#direccion").val($("#direccion_"+id).html())
	}
	else{
		$('#employeeModal').modal('show')
		$("#nombre").val('')
		$("#aPaterno").val('')
		$("#aMaterno").val('')
		$('#curp').val('')
		$("#genero").val('')
		$("#direccion").val('')
	}
}
function saveChangesEmployee() {	
	if ($("#name_producto").val()!=""&&$("#form_validation").valid()==true) {
		$('#employeeModal').modal('hide')
		$("#loading").modal('show');
		if (id_empleado!=0) {
			var comida=0
			var bebida=0
			if ($("#tipe_product").val()=="1") {
				comida=1
			}
			if ($("#tipe_product").val()=="2") {
				bebida=1
			}
			$.ajax({
				type: "post",
				url: base_url+'index.php/Welcome/apiConecction',
				data:{
				  url:'general/editEmployee',
				  idEmpleado: id_empleado,
				  Nombre:$("#nombre").val(),
				  ApellidoPaterno:$("#aPaterno").val(),
				  ApellidoMaterno:$("#aMaterno").val(),
				  curp:$("#curp").val(),
				  Genero:$("#genero").val(),
				  Direccion:$("#direccion").val()
				},
				dataType: "json", 
				success: function(response)
				{
					$("#loading").modal('hide')
					if (response.status) {						
						alertify.alert('Bien','Cambios guardados correctamente')						
						$("#nombre_"+id_empleado).html($("#nombre").val())
						$("#aPaterno_"+id_empleado).html($("#aPaterno").val())
						$("#aMaterno_"+id_empleado).html($("#aMaterno").val())
						$('#curp_'+id_empleado).html($("#curp").val())
						$('#edad_'+id_empleado).html($("#edad").val())
						$("#genero_"+id_empleado).html($("#genero").val())
						$("#direccion_"+id_empleado).html($("#direccion").val())
					}
					else{
						alertify.alert("Error","Error al guarar cambios. Error : "+response.error);
						$('#productModal').modal('show')
					}
					
				},
				failure:function(a,b,c) {
					$("#loading").modal('hide')
				  alertify.alert("Error","Error al guarar cambios. Error : "+b);
				},
				error:function(a,b,c) {
					$("#loading").modal('hide')
				  alertify.alert("Error","Error al guarar cambios. Error : "+b);
				}
			})
		} else {
			$.ajax({
				type: "post",
				url: base_url+'index.php/Welcome/apiConecction',
				data:{
				  url:'general/addEmployee',
				  Nombre:$("#nombre").val(),
				  ApellidoPaterno:$("#aPaterno").val(),
				  ApellidoMaterno:$("#aMaterno").val(),
				  curp:$("#curp").val(),
				  Genero:$("#genero").val(),
				  Direccion:$("#direccion").val()
				},
				dataType: "json", 
				success: function(response)
				{
					$("#loading").modal('hide')
					if (response.status) {
						$('.js-exportable').dataTable().fnDestroy()						
						$("#category_table").append("<tr id='row_producto_"+response.id+"'>"+
														"<td id='nombre_"+response.id+"'>"+$("#nombre").val()+"</td>"+
														"<td id='aPaterno_"+response.id+"'>"+$("#aPaterno").val()+"</td>"+
														"<td id='aMaterno_"+response.id+"'>"+$("#aMaterno").val()+"</td>"+
														"<td id='curp_"+response.id+"'>"+$("#curp").val()+"</td>"+
														"<td id='edad_"+response.id+"'>"+$("#edad").val()+"</td>"+
														"<td id='genero_"+response.id+"'>"+$("#genero").val()+"</td>"+
														"<td id='direccion_"+response.id+"'>"+$("#direccion").val()+"</td>"+
														"<td>"+
														"<button type='button' class='btn btn-primary btn-circle waves-effect waves-circle waves-float' onclick='addEditProduct("+response.id+");'>"+
                                                			"<i class='material-icons'>mode_edit</i>"+
                                            			"</button>"+
			                                            "<button type='button' class='btn btn-danger btn-circle waves-effect waves-circle waves-float' onclick='deleteProduct("+response.id+");'>"+
			                                               " <i class='material-icons'>delete_forever</i>"+
			                                           " </button></td></tr>")
						$('.js-exportable').DataTable().fnDraw()
						
						alertify.alert('Bien','Cambios guardados correctamente')
					}
					else{
						$('#productModal').modal('show')
						alertify.alert("Error","Error al guarar cambios. Error : ");
					}
				},
				failure:function(a,b,c) {
					$("#loading").modal('hide')
				  alertify.alert("Error","Error al al guardar cambios. Error : "+b);
				},
				error:function(a,b,c) {
					$("#loading").modal('hide')
				  alertify.alert("Error","Error al al guardar cambios. Error : "+b);
				}
			})
		}
	}	
}

function deleteEmployee(id) {
	if (id!=0) {
			alertify.confirm('Eliminar empleado', "¿Seguro que desea eliminar al empleado "+$("#nombre_"+id).html()+"?", 
			function(){
				$("#deleting").modal('show') 
				$.ajax({
				type: "post",
				url: base_url+'index.php/Welcome/apiConecction',
				data:{
				  url:'general/deleteEmployee',
				  idEmpleado:id
				},
				dataType: "json", 
				success: function(response)
				{
					$("#deleting").modal('hide')
					if (response.status) {
						$('.js-exportable').dataTable().fnDestroy()
						$("#row_empleado_"+id).remove();
						$('.js-exportable').DataTable().fnDraw()
						
						alertify.alert('Bien','Cambios guardados correctamente')
					}
					else{
						alertify.alert("Error","Error al eliminar. <br> Error : ");
					}
				},
				failure:function(a,b,c) {
					$("#deleting").modal('hide')
				  alertify.alert("Error","Error al eliminar. <br> Error : "+b);
				},
				error:function(a,b,c) {
					$("#deleting").modal('hide')
				  alertify.alert("Error","Error al eliminar. <br> Error : "+b);
				}
				})
			},
			function(){ 
				alertify.set('notifier','position', 'top-left');
				alertify.warning('Cancelado')
			})
	}
}