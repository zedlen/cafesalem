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
		console.log(response)
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
	},
	failure:function(a,b,c) {
	  alertify.alert("Error","Error al obtener ticket abierto de la mesa. <br> Error : "+b);
	},
	error:function(a,b,c) {
	  alertify.alert("Error","Error al obtener ticket abierto de la mesa. <br> Error : "+b);
	}
})


$.ajax({
	type: "post",
	url: base_url+'index.php/Welcome/apiConecction',
	data:{
	  url:'general/getAnnualReport',	  
	},
	dataType: "json", 
	success: function(response)
	{
		console.log(response)
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
	},
	failure:function(a,b,c) {
	  alertify.alert("Error","Error al obtener ticket abierto de la mesa. <br> Error : "+b);
	},
	error:function(a,b,c) {
	  alertify.alert("Error","Error al obtener ticket abierto de la mesa. <br> Error : "+b);
	}
})