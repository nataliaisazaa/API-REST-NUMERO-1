var xhr = $.ajax("https://unforgotten-argumen.000webhostapp.com/api/productos/lista").done(function(detalle){
	var data = JSON.parse(detalle);
	$.each(data, function(key, detalle){
		$("#cargar_api").append(
			'<div class="col-md-4">'+
				'<img src="'+ detalle.imagen +'" width="128" height="128" /><br>' +
				'<b>'+ detalle.nombre +' ['+ detalle.talla +']</b><br>'+
				'<small>'+ detalle.precio +'</small><br><br>'+
			'</div>'
		);
	});
})
.fail(function(){
	console.log("Error");
});