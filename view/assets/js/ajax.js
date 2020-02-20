$("#btncargar").on("click", function (e) {
	e.preventDefault();
	var frm = $("#formFoto").serialize();
	$.ajax({
		type: "POST",
		url: "../action/cargarfoto.php",
		data: frm
	}).done(function(info){
		
	})
});