<?php
	$db_test = '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (COMMUNITY = tcp.world)(PROTOCOL = TCP)(Host = info.gda.itesm.mx)(Port = 1521)))(CONNECT_DATA = (SID = alum)))';
	$conn = oci_connect('a01223920', 'tec3920', $db_test);
?>

<!DOCTYPE html>
<html>
	
<head>
	<title>MiCoto Condo</title>
		<meta charset="utf-8">
		<link href="css/condo_style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
<body>
		<div style="width: 920px; margin: 0 auto; padding: 100px 0 0px;">
			<div>	 
				<ul id="tabs">
				    <li><a href="#" name="tab1">Propietarios</a></li>
				    <li><a href="#" name="tab2">Arrendatarios</a></li>
				    <li><a href="#" name="tab3">Propiedades</a></li>
				    <li><a href="#" name="tab4">Areas Comunes</a></li>    
				</ul>

				<div id="content"> 
				    <div id="tab1">

				    <?php
				    	$select = "select representante Propetario, direccion Direccion
									from a01223920.tiene t
									natural join a01223920.condo
									join a01223920.propiedad p
									on t.propid = p.propid
									where t.tipo = 'Dueno'
									order by representante
									";
						$parsed = oci_parse($conn, $select);
						$r = oci_execute($parsed);
						while($row = oci_fetch_array($parsed, OCI_RETURN_NULLS+OCI_NUM)){
							print '<h1><strong>Propietario ';
							echo $row[0];
							print '</strong></h1>';
							print '<p> Direccion: ';
							echo $row[1];
							print '</p>';
							print '<br><br>';
						}


				    ?>


				    </div>
				    <div id="tab2">
				    	<?php
				    	$select = "select representante Arrendatario, direccion Direccion
				    				from a01223920.tiene t
									natural join a01223920.condo
									join a01223920.propiedad p
									on t.propid = p.propid
									where t.tipo = 'Renta'
									order by representante";
						$parsed = oci_parse($conn, $select);
						$r = oci_execute($parsed);
						while($row = oci_fetch_array($parsed, OCI_RETURN_NULLS+OCI_NUM)){
							print '<h1><strong>Arrendatario ';
							echo $row[0];
							print '</strong></h1>';
							print '<p> Direccion: ';
							echo $row[1];
							print '</p>';
							print '<br><br>';
						}

						?>

				    </div>
				    <div id="tab3">
				    	<?php
				    	$select = "select propid ID, estado Estado, tipo Tipo, direccion Direccion, infobasica Informacion
									from a01223920.propiedad
									order by propid
									";
						$parsed = oci_parse($conn, $select);
						$r = oci_execute($parsed);
						while($row = oci_fetch_array($parsed, OCI_RETURN_NULLS+OCI_NUM)){
							print '<h1><strong>Propiedad ';
							echo $row[0];
							print '</strong></h1>';
							print '<p> Estado: ';
							echo $row[1];
							print '</p>';
							print '<p> Tipo: ';
							echo $row[2];
							print '</p>';
							print '<p> Direccion: ';
							echo $row[3];
							print '</p>';
							print '<p> Informacion: ';
							echo $row[4];
							print '</p>';
							print '<br><br>';
						}

						?>
				    


				    </div>
				    <div id="tab4">


				    <?php
				    	$select = "select nombre Nombre, tipo Tipo, capacidad Capacidad, costo Costo
									from a01223920.instalacion
									order by nombre";
						$parsed = oci_parse($conn, $select);
						$r = oci_execute($parsed);
						while($row = oci_fetch_array($parsed, OCI_RETURN_NULLS+OCI_NUM)){
							print '<h1><strong>Area Comun ';
							echo $row[0];
							print '</strong></h1>';
							print '<p> Tipo: ';
							echo $row[1];
							print '</p>';
							print '<p> Capacidad: ';
							echo $row[2];
							print '</p>';
							print '<p> Costo: ';
							echo $row[3];
							print '</p>';
							print '<br><br>';
						}

						?>



				    </div>
				</div>
			</div>
		</div>
			
			<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
			<script>
			$(document).ready(function() {
			    $("#content").find("[id^='tab']").hide(); // Hide all content
			    $("#tabs li:first").attr("id","current"); // Activate the first tab
			    $("#content #tab1").fadeIn(); // Show first tab's content
    
			    $('#tabs a').click(function(e) {
			        e.preventDefault();
			        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
			         return;       
			        }
			        else{             
			          $("#content").find("[id^='tab']").hide(); // Hide all content
			          $("#tabs li").attr("id",""); //Reset id's
			          $(this).parent().attr("id","current"); // Activate this
			          $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
			        }
			    });
			});
			</script>

	<div class="copy-right">
		<p>Crea un <a href="ad.php">Usuario</a></p> 
		<p>Solares Zapopan <a href="http://micoto.com">MiCoto</a></p> 
	</div>
</body>
</html>