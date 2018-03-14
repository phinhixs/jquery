<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>Ejemplo 3: Fechas en javascript</title>

	<link rel="stylesheet" type="text/css" href="calendar-win2k-cold-1.css" /> <!-- estilo -->
	<script type="text/javascript" src="calendar.js"></script> <!-- principal -->
	<script type="text/javascript" src="calendar-es.js"></script>  <!-- idioma -->
	<script type="text/javascript" src="calendar-setup.js"></script> <!-- config -->

	<script type="text/javascript">

	function armar_calendario() {
		Calendar.setup({
		inputField     :    "nacim",    // id del input para fecha
		ifFormat       :    "%d/%m/%Y", // formato
		button         :    "abrircal", // id del botón que abre calendario
		});
	}

	function validar_fecha() {

		var f=document.getElementById('nacim').value;
		
		if (f == "") // que la fecha esté
		{
			alert("Por favor ingrese su fecha de nacimiento");
			return false;
		}

		var elementos=f.split("/");
		if (elementos.length != 3) //que tenga dos barras o tres subgrupos de nros
		{
			alert("La fecha ingresada no es válida.");
			return false;
		}

		if (elementos[0]=="" || elementos[1]=="" || elementos[2]=="" ) //que los tres tengan algo
		{
			alert("La fecha ingresada no es válida..");
			return false;
		}

		if (isNaN(elementos[0]) || isNaN(elementos[1]) || isNaN(elementos[2]) ) //que sean tres números
		{
			alert("La fecha ingresada no es válida...");
			return false;
		}

		//que sea una fecha de verdad
		var prueba=new Date(elementos[2], elementos[1]-1, elementos[0]);
		var anio=prueba.getFullYear();
		var mes=prueba.getMonth();
		var dia=prueba.getDate();

		if (anio != elementos[2] || mes != elementos[1]-1 || dia != elementos[0])
		{
			alert("La fecha ingresada no es válida....");
			return false;
		}

		//que no sea menor de 18 años
		var fechahoy=new Date();
		var aniohoy=fechahoy.getFullYear();
		var meshoy=fechahoy.getMonth();
		var diahoy=fechahoy.getDate();

		if (prueba > fechahoy){
			alert ("La fecha de nacimiento debe ser menor a la fecha actual");
			return false;		
		}
		
		if(mes > meshoy){ 
			var edad = aniohoy - anio - 1; 
		}
		else{ 
			if(mes == meshoy && dia>diahoy){ 
				var edad = aniohoy - anio - 1;  
			}
			else{ 
				var edad = aniohoy - anio; 
			} 
		} 
		
		if (edad < 18){
			alert ("Debe ser mayor de 18 años");
			return false;
		} 
		
		return true;
	}

	</script>

</head>
<body onLoad="armar_calendario()">

<h1>Fechas en javascript</h1>

	<form action="noimporta" method="get" onSubmit="return validar_fecha()">

		Ingrese su nombre: <input type="text" name="nombre" /> <br />
		Ingrese su nacimiento: <input type="text" name="nacim" id="nacim" /> 
			<input type="button" id="abrircal" value="..." /> <br />

		<input type="submit" />

	</form>

</body>
</html>