var id_producto=0;

$('#form_validation').validate({
    rules: {
        'checkbox': {
            required: true
        },
        'gender': {
            required: true
        }
    },
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
var tipo=["Comida","Bebida","Ninguno"]
function addEditProduct(id) {
	id_producto=id
	if (id!=0) {
		var val="3"
		if ($("#tipo_"+id).html()=="Comida") {
			val="1"
		}
		if ($("#tipo_"+id).html()=="Bebida") {
			val="2"
		}
		$('#productModal').modal('show')
		$("#name_producto").val($("#name_"+id).html())
		$("#description_producto").val($("#description_"+id).html())
		$("#prize_product").val(parseFloat($("#precio_"+id).attr('precio')))
		$('#tipe_product').val(val).change();
		$("#category_product").val($("#categoria_"+id).attr('categoria')).change()
	}
	else{
		$('#productModal').modal('show')
		$("#name_producto").val('')
		$("#description_producto").val('')
		$("#prize_product").val('')
		$('#tipe_product').val('').change();
		$("#category_product").val('').change()
	}
}
function saveChangesProduct() {	
	if ($("#name_producto").val()!=""&&$("#form_validation").valid()==true) {
		$('#productModal').modal('hide')
		$("#loading").modal('show');
		if (id_producto!=0) {
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
				  url:'general/editProduct',
				  idProducto: id_producto,
				  Nombre:$("#name_producto").val(),
				  Descripcion:$("#description_producto").val(),
				  Comida:comida,
				  Bebida:bebida,
				  Categoria:$("#category_product").val(),
				  Precio:$("#prize_product").val()
				},
				dataType: "json", 
				success: function(response)
				{
					$("#loading").modal('hide')
					if (response.status) {						
						alertify.alert('Bien','Cambios guardados correctamente')
						$("#name_"+id_producto).html($("#name_producto").val())
						$("#description_"+id_producto).html($("#description_producto").val())
						$("#precio_"+id_producto).html($("#prize_product").val())
						$("#categoria_"+id_producto).html($("#category_product :selected").text())
						$("#tipo_"+id_producto).val(tipo[parseInt($("#tipe_product").val())-1])
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
				  url:'general/addProduct',
				  Nombre:$("#name_producto").val(),
				  Descripcion:$("#description_producto").val(),
				  Comida:comida,
				  Bebida:bebida,
				  Categoria:$("#category_product").val() ,
				  Precio:$("#prize_product").val() 
				},
				dataType: "json", 
				success: function(response)
				{
					$("#loading").modal('hide')
					if (response.status) {
						$('.js-exportable').dataTable().fnDestroy()
						$("#category_table").append("<tr id='row_producto_"+response.id+"'>"+
														"<td id='name_"+response.id+"'>"+$("#name_producto").val()+"</td>"+
														"<td id='description_"+response.id+"'>"+$("#description_producto").val() +"</td>"+
														"<td id='categoria_"+response.id+"' categoria='"+$("#category_product").val()+"'>"+$("#category_product :selected").text()+"</td>"+
				                                        "<td id='precio_"+response.id+"' precio='"+$("#prize_product").val() +"'>&#36;"+$("#prize_product").val() +"</td>"+
				                                        "<td id='tipo_"+response.id+"'>"+tipo[parseInt($("#tipe_product").val())-1]+"</td>"+
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

function deleteProduct(id) {
	if (id!=0) {
			alertify.confirm('Eliminar producto', "¿Seguro que desea eliminar la producto "+$("#name_"+id).html()+"?", 
			function(){
				$("#deleting").modal('show') 
				$.ajax({
				type: "post",
				url: base_url+'index.php/Welcome/apiConecction',
				data:{
				  url:'general/deleteProduct',
				  idProducto:id
				},
				dataType: "json", 
				success: function(response)
				{
					$("#deleting").modal('hide')
					if (response.status) {
						$('.js-exportable').dataTable().fnDestroy()
						$("#row_producto_"+id).remove();
						$('.js-exportable').DataTable().fnDraw()
						
						alertify.alert('Bien','Cambios guardados correctamente')
					}
					else{
						alertify.alert("Error","Error al eliminar producto. <br> Error : ");
					}
				},
				failure:function(a,b,c) {
					$("#deleting").modal('hide')
				  alertify.alert("Error","Error al eliminar producto. <br> Error : "+b);
				},
				error:function(a,b,c) {
					$("#deleting").modal('hide')
				  alertify.alert("Error","Error al eliminar producto. <br> Error : "+b);
				}
				})
			},
			function(){ 
				alertify.set('notifier','position', 'top-left');
				alertify.warning('Cancelado')
			})
	}
}