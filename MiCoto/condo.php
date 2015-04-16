
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
	<div style="width: 1280px; height: 588px; margin: 0 auto; padding: 0px 90px 0px;">
		<div style="width: 700px; float:left; margin: 0 left; padding: 100px 25px 0px;">
			<div>	 
				<ul id="tabs">
				    <li><a href="#" name="tab1">Propiedades</a></li>
				    <li><a href="#" name="tab2">Areas Comunes</a></li>
				    <li><a href="#" name="tab3">Galeria</a></li>
				</ul>

				<div id="content"> 
				    <div id="tab1">

				    	<?php
				    	$select = "select propid ID, estado Estado, tipo Tipo, direccion Direccion, infobasica Informacion
									from a01223920.propiedad
									where estado = 'Disponible'
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

						?> <!-- propiedades -->
				    	

				    </div>
				    <div id="tab2">

				    	<!-- areas comunes -->
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
				    <div id="tab3">
				    	<img style="width: 100px; display:inline-block;" src="images/casa0.jpg" />
				    	<img style="width: 100px; display:inline-block;" src="images/casa1.jpg" />
				    	<img style="width: 100px; display:inline-block;" src="images/casa2.jpg" />
				    	<img style="width: 100px;" src="images/casa3.jpg" />
				    	<img style="width: 100px; display:inline-block;" src="images/ac0.jpg" />
				    	<img style="width: 100px; display:inline-block;" src="images/ac1.jpg" />
				    	<img style="width: 100px; display:inline-block;" src="images/ac2.jpg" />
				    	<img style="width: 100px;" src="images/ac3.jpg" />
				    
				    </div>
				</div>
			</div>
		</div>
		
		<div style="width: 300px; float:left; margin: 0 right; padding: 100px 25px 0px;">
			<div>	 
				<ul id="tabs">
				    <li><a href="#" name="tab1">Noticias</a></li>
				</ul>

				<div id="content"> 
				    <div id="tab1">
				    	<?php
				    	$select = "select mensajeid, mensaje
				    	from a01223920.informa
				    	order by mensajeid desc";
						$parsed = oci_parse($conn, $select);
						$r = oci_execute($parsed);
						while($row = oci_fetch_array($parsed, OCI_RETURN_NULLS+OCI_NUM)){
							print '<h1><strong>Mensaje ';
							echo $row[0];
							print '</strong></h1>';
							print '<p> ';
							echo $row[1];
							print '</p>';
							print '<br><br>';
						}

						?>

				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="copy-right">
		<p>Solares Zapopan <a href="http://micoto.com">MiCoto</a></p> 
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
</body>
</html>