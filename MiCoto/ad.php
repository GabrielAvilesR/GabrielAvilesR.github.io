	<?php 
		$db = '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (COMMUNITY = tcp.world)(PROTOCOL = TCP)(Host = info.gda.itesm.mx)(Port = 1521)))(CONNECT_DATA = (SID = alum)))';
		$conn = oci_connect('a01112493', 'tec2493', $db);
		$usuarioErr = $passwdErr = $repreErr = $adminErr  = "";
				$usuario = $passwd = $repre = $admin= "";
				$query = false;
	?>


<html>
	<head> <title> MiCoto </title> </head>

	<body>
		<h1> BIENVENIDO </h1>

		<h2> Crea un Usuario </h2>

		<p> Formulario para crear un usuario </p>

		<?php
				

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["usuario"])) {
     $usuarioErr = "Campo requerido";
   } else {
     $usuario = test_input($_POST["usuario"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$usuario)) {
       $usuarioErr = "Solo letras y espacios"; 
     }
   }
   
   if (empty($_POST["passwd"])) {
     $passwdErr = "Campo Requerido";
   } else {
     $passwd = test_input($_POST["passwd"]);
   }
     
   
   if (empty($_POST["repre"])) {
     $repreErr = "Campo requerido";
   } else {
     $repre = test_input($_POST["repre"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$repre)) {
       $repreErr = "solo letras y espacios"; 
     }
   }
  

   if (empty($_POST["admin"])) {
     $adminErr = "campo requerido";
   } else {
     $admin = test_input($_POST["admin"]);
   }
   $query = true;
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
		?>
		<p><span class="error">* campo requerido</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Usuario: <input type="text" name="usuario" value="<?php echo $usuario;?>">
   <span class="error">* <?php echo $usuarioErr;?></span>
   <br><br>
   Contraseña: <input type="password" name="passwd" value="<?php echo $passwd;?>">
   <span class="error">* <?php echo $passwdErr;?></span>
   <br><br>
   Representante / nombre: <input type="text" name="repre" value="<?php echo $repre;?>">
   <span class="error">* <?php echo $repreErr;?></span>
   <br><br>
   
   Administrador:
   <input type="radio" name="admin" <?php if (isset($admin) && $admin=="Si") echo "checked";?>  value="Si">Si
   <input type="radio" name="admin" <?php if (isset($admin) && $admin=="No") echo "checked";?>  value="No">No
   <span class="error">* <?php echo $adminErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
	<?php
		if($query){
			if($admin == "Si"){
				
				$insert = "INSERT INTO a01223920.ADMIN(AUSUARIO,CONTRASENA,NOMBRE, NIVEL)". "VALUES( :usr, :passwd, :repre, 1)";
				$parsed = oci_parse($conn, $insert);
				oci_bind_by_name($parsed, ":usr", $usuario);
				oci_bind_by_name($parsed, ":passwd", $passwd);
				oci_bind_by_name($parsed, ":repre", $repre);
				oci_execute($parsed);
			}else if($admin =="No"){
				
				$insert = "INSERT INTO a01223920.CONDO(CUSUARIO, CONTRASENA, REPRESENTANTE)". "VALUES( :usr, :passwd, :repre)";
				$parsed = oci_parse($conn, $insert);
				oci_bind_by_name($parsed, ':usr', $usuario);
				oci_bind_by_name($parsed, ':passwd', $passwd);
				oci_bind_by_name($parsed, ':repre', $repre);
				oci_execute($parsed);
			}
			header('Location: admin.php');
		}
		$query = false;
	?>

	
	</body>
</html>