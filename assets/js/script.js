function imprimir(){
	confirm("¿Seguro que desea cerrar el pedido?");
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
	var table_id=$(this).val()
})
