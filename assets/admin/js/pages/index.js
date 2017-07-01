$('.count-to').countTo();

$('.js-exportable').DataTable({
	dom: 'Bfrtip',
	responsive: true,
	buttons: [
	'copy', 'csv', 'excel', 'pdf', 'print'
	]
});


$.ajax({
	type: "post",
	url: base_url+'index.php/Welcome/apiConecction',
	data:{
	  url:'general/getMonthlyReport',	  
	},
	dataType: "json", 
	success: function(response)
	{
		if (response.status) {
			var data=[];
			$.each(response.tickets,function(index,value) {
				var found= false
				$.each(data,function(key,obj) {
					if (obj.Fecha==value.Fecha) {
						found=true;
						obj.Total=obj.Total+parseFloat(value.Total)
						return false
					}
				})
				if (!found) {
					data.push({Fecha:value.Fecha,Total:parseFloat(value.Total)})
				}
			})
			/new Morris.Bar({
			  // ID of the element in which to draw the chart.
			  element: 'monthly_report',
			  // Chart data records -- each entry in this array corresponds to a point on
			  // the chart.
			  data: data,
			  // The name of the data record attribute that contains x-values.
			  xkey: 'Fecha',
			  // A list of names of data record attributes that contain y-values.
			  ykeys: ['Total'],
			  // Labels for the ykeys -- will be displayed when you hover over the
			  // chart.
			  labels: ['Venta $']
			});
		}
		else{
			$("#monthly_report").append('<h3>No existen datos para generar reporte</h3>')
		}
	},
	failure:function(a,b,c) {
	
	},
	error:function(a,b,c) {
	
	}
})

var meses= ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]

$.ajax({
	type: "post",
	url: base_url+'index.php/Welcome/apiConecction',
	data:{
	  url:'general/getAnnualReport',	  
	},
	dataType: "json", 
	success: function(response)
	{
		if (response.status) {
			var data=[];
			$.each(response.tickets,function(index,value) {
				var found= false
				var fecha=value.Fecha.split('/')
				var fechaTicket=meses[parseInt(fecha[1])-1]+" "+fecha[2]			
				$.each(data,function(key,obj) {
					var fecha2=obj.Fecha.split('/')
					var fechaTicket2=meses[parseInt(fecha2[1])-1]+" "+fecha2[2]	
					if (fecha[1]==fecha[1]&&fecha[2]==fecha[2]) {
						found=true;
						obj.Total=obj.Total+parseFloat(value.Total)
						return false
					}
				})
				if (!found) {
					data.push({Fecha:fechaTicket,Total:parseFloat(value.Total)})
				}
			})
			/new Morris.Bar({
			  // ID of the element in which to draw the chart.
			  element: 'annual_report',
			  // Chart data records -- each entry in this array corresponds to a point on
			  // the chart.
			  data: data,
			  // The name of the data record attribute that contains x-values.
			  xkey: 'Fecha',
			  // A list of names of data record attributes that contain y-values.
			  ykeys: ['Total'],
			  // Labels for the ykeys -- will be displayed when you hover over the
			  // chart.
			  labels: ['Venta $']
			});
		}
		else{
			$("#annual_report").append('<h3>No existen datos para generar reporte</h3>')
		}
	},
	failure:function(a,b,c) {
	
	},
	error:function(a,b,c) {
	
	}
})

