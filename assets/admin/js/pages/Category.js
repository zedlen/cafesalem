var id_categoria=0;
function addEditCategory(id) {
	id_categoria=id
	if (id!=0) {
		$('#categoryModal').modal('show')
		$("#name_category").val($("#name_"+id).html())
		$("#description_category").val($("#description_"+id).html())
	}
	else{
		$('#categoryModal').modal('show')
		$("#name_category").val('')
		$("#description_category").val('')
	}
}
function saveChangesCategory() {
	$('#categoryModal').modal('hide')
	$("#loading").modal('show');
	if ($("#name_category").val()!="") {
		if (id_categoria!=0) {
			$.ajax({
				type: "post",
				url: base_url+'index.php/Welcome/apiConecction',
				data:{
				  url:'general/editCategory',
				  idCategoria: id_categoria,
				  Nombre:$("#name_category").val(),
				  Descripcion:$("#description_category").val()
				},
				dataType: "json", 
				success: function(response)
				{
					$("#loading").modal('hide')
					if (response.status) {		
						$("#name_"+id).val($("#name_category").val())
						$("#description_"+id).val($("#description_category").val())				
						alertify.alert('Bien','Cambios guardados correctamente')
					}
					else{
						alertify.alert("Error","Error al guarar cambios. Error : ");
						$('#categoryModal').modal('show')
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
				  url:'general/addCategory',
				  Nombre:$("#name_category").val(),
				  Descripcion:$("#description_category").val()  
				},
				dataType: "json", 
				success: function(response)
				{
					$("#loading").modal('hide')
					if (response.status) {
						$('.js-exportable').dataTable().fnDestroy()
						$("#category_table").append("<tr id='row_categoria_"+response.id+"'>"+
														"<td id='name_"+response.id+"'>"+$("#name_category").val()+"</td>"+
														"<td id='description_"+response.id+"'>"+$("#description_category").val() +"</td>"+
														"<td>"+
														"<button type='button' class='btn btn-primary btn-circle waves-effect waves-circle waves-float' onclick='addEditCategory("+response.id+");'>"+
                                                			"<i class='material-icons'>mode_edit</i>"+
                                            			"</button>"+
			                                            "<button type='button' class='btn btn-danger btn-circle waves-effect waves-circle waves-float' onclick='deleteCategory("+response.id+");'>"+
			                                               " <i class='material-icons'>delete_forever</i>"+
			                                           " </button></td></tr>")
						$('.js-exportable').DataTable().fnDraw()
						
						alertify.alert('Bien','Cambios guardados correctamente')
					}
					else{
						$('#categoryModal').modal('show')
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
	else{
		$("#loading").modal('hide')
		alertify.alert('Error','El nombre de categoria no puede ser vacio')
	}
}

function deleteCategory(id) {
	if (id!=0) {
			alertify.confirm('Eliminar categoria', "¿Seguro que desea eliminar la categoria "+$("#name_"+id).html()+"?", 
			function(){
				$("#deleting").modal('show') 
				$.ajax({
				type: "post",
				url: base_url+'index.php/Welcome/apiConecction',
				data:{
				  url:'general/deleteCategory',
				  idCategoria:id
				},
				dataType: "json", 
				success: function(response)
				{
					$("#deleting").modal('hide')
					if (response.status) {
						$('.js-exportable').dataTable().fnDestroy()
						$("#row_categoria_"+id).remove();
						$('.js-exportable').DataTable().fnDraw()
						
						alertify.alert('Bien','Cambios guardados correctamente')
					}
					else{
						alertify.alert("Error","Error al eliminar categoria. <br> Error : ");
					}
				},
				failure:function(a,b,c) {
					$("#deleting").modal('hide')
				  alertify.alert("Error","Error al eliminar categoria. <br> Error : "+b);
				},
				error:function(a,b,c) {
					$("#deleting").modal('hide')
				  alertify.alert("Error","Error al eliminar categoria. <br> Error : "+b);
				}
				})
			},
			function(){ 
				alertify.set('notifier','position', 'top-left');
				alertify.warning('Cancelado')
			})
	}
}