		function fail(){
		$.dialog({
		title: '¡Parece que algo salio mal!',
		content: 'Usuario o contraseña incorrecto',
		theme: 'modern',
		type:'red',
		icon: 'far fa-frown-open',
		});
		}
		function exito(name,direc){
		$.alert({
		title: '¡Excelente!',
		content: 'Bienvenido '+name,
		theme: 'modern',
		type:'green',
		icon: 'fas fa-laugh-wink',
		autoClose: 'Ok|1000',
		buttons: {
		Ok: function () {
		if (direc=='00') {window.location.href='c_panel/'}
		if (direc=='01') {window.location.href='instructores/'}
		if (direc=='02') {window.location.href='alumno/'}
		if (direc=='03') {window.location.href='despacho/'}
		}
		}
		});
		}



		function vacio(){
		$.alert({
		title: '¡Alertaa!',
		content: 'Debes rellenar todos los campos',
		theme: 'modern',
		type:'orange',
		icon: 'fas fa-exclamation'
		});
		}


		$("#form-password").on('keypress',function(e) {
		if(e.which == 13) {
		
		var user = $("#form-username").val();
		var contra =$("#form-password").val();
		if (user=="" || contra=="") {
		vacio();
		$('input[type="text"]').val('');
		$('input[type="password"]').val('');
		}else{
		$.ajax({
		url:"assets/login.php",
		method: "POST",
		data: {user:user,contra:contra},
		success:function(data){
		var arr =data.split("-");
		// ============== arr[0] ingreso, arr[1] direccion, arr[2] Name
		
		console.log(arr);
		if (arr[0]=='01') {
		exito(arr[2],arr[1]);
		}else{
		console.log(data);
		fail();
		$('input[type="text"]').val('');
		$('input[type="password"]').val('');
		}
		},
		})
		}
		
		}
		});
		$(document).on("click", "#sub",function(){
		var user = $("#form-username").val();
		var contra =$("#form-password").val();
		if (user=="" || contra=="") {
		vacio();
		$('input[type="text"]').val('');
		$('input[type="password"]').val('');
		}else{
		$.ajax({
		url:"assets/login.php",
		method: "POST",
		data: {user:user,contra:contra},
		success:function(data){
		var arr =data.split("-");
		// ============== arr[0] ingreso, arr[1] direccion, arr[2] Name
		
		console.log(arr);
		if (arr[0]=='01') {
		exito(arr[2],arr[1]);
		
		}else{
		console.log(data);
		fail();
		$('input[type="text"]').val('');
		$('input[type="password"]').val('');
		}
		},
		})
		}
		})
		