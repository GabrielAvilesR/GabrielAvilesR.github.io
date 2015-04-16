<?php 



function SignIn() { 
	$db_test = '(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (COMMUNITY = tcp.world)(PROTOCOL = TCP)(Host = info.gda.itesm.mx)(Port = 1521)))(CONNECT_DATA = (SID = alum)))';
	$conn = oci_connect('a01223920', 'tec3920', $db_test);
	$select = "SELECT ausuario, contrasena, nivel
				from admin UNION 
				(select cusuario as ausuario, contrasena, nivel
				from condo)";
	$parsed = oci_parse($conn, $select);
	$r = oci_execute($parsed);
	$correct = false;
	while($row = oci_fetch_array($parsed, OCI_RETURN_NULLS+OCI_NUM)){
		if($row[0] === $_POST['user'] && $row[1] === $_POST['pass']){
			if($row[2] === null || $row[2] < 1){
				$correct = true;
				header('Location: condo.php');	
			} else {
				$correct = true;
				header('Location: admin.php');	
			}
		} 
	}
	if(!$correct){
		header('Location: index.html');	
	}	





	
 } 
 if(isset($_POST['submit'])) { 
	 SignIn(); 
 } 
			
?>