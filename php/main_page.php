<?php 
session_start();

include 'bd.php';
if(isset($_POST['connexion'])){
	$id = $_POST['id'];
	$pass = $_POST['pass'];

	$sql_connexion = "select * from membres where  ( email_membre = '$id' or cin_membre = '$id' or tel_membre = '$id' ) and  code_membre = '$pass'  ";
	$res_connexion = $bd->query($sql_connexion);
	if(mysqli_num_rows($res_connexion) == 1){
/*SI les données incorrect *********************************************/
		while ($membre = $res_connexion->fetch_assoc()) {
			$nom_membre = $membre['nom_membre'];
			$type_membre = $membre['type_membre'];
			$id_membre = $membre['id_membre'];
			$specialite_membre = $membre['specialite_membre'];
			$img_membre = $membre['img_membre'];

			$_SESSION['nom_membre'] = $nom_membre;
			$_SESSION['id_membre'] = $id_membre;
			$_SESSION['img_membre'] = "data:image/jpeg;base64,".base64_encode($img_membre)."";;
			$_SESSION['specialite_membre'] = $specialite_membre;
			$_SESSION['type_membre'] = $type_membre;

			switch ($type_membre) {
				case 'Infermerie':
					header('location: infermerie.php');
					break;

				case 'Secretaire':
					header('location: secretaire.php');
					break;

				case 'Medecine':
					header('location: medecine.php');
					break;
			}
		}
	}
	else{
		/*SI les données incorrect *********************************************/
		?>
<html lang="en">
  <head>
    <title>Infermerie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../table/jquery.dataTables.min.css">
    <link href="../images/logo.png" rel="icon" >
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.rtl.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-grid.rtl.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-grid.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-reboot.rtl.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-reboot.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-utilities.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-utilities.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-utilities.rtl.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap-utilities.rtl.min.css">
    <script type="text/javascript" src="../js/bootstrap/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap/bootstrap.esm.js"></script>
    <script type="text/javascript" src="../js/bootstrap/bootstrap.esm.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="../js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  </head>
  <body class="bg-light">
    <div class="alert-danger alert m-5 p-2">
    <img src="../images/logo.png" class="rounded-pill border-1" height="50px" width="50px">
    	 Connexion Impossible 
    	<a class="float-start m-2 btn text-danger bg-white" href="../index.php">Accueil</a>
    </div>
  </body>
</html>
		<?php
	}
} 

?>