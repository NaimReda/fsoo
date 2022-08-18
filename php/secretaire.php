<?php 
  include 'bd.php';
session_start();


?>
<!doctype html>
<html lang="en">
  <head>
    <title>Secretaire</title>
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
    <style type="text/css">
      .x {
      font-size: 20px; 
      }
      .bg_blue{
      background-color: rgb(173,216,230);
      }
      button:hover , .btn_hover:hover {
      opacity: 20%;
      background-color: lightgray;
      color: black;
      }
      .btn{
      border-bottom: 2px red solid;
      border-radius: 0px;
      border-radius: 2px;
      color: grey;
      background-color: transparent;
      font-weight: 500;
      }
      .collapsed{
      border-bottom: 0px;
      background-color: transparent;
      }
      .card{
      background-color: transparent;
      /* overflow-y: scroll;
      height: 100vh;*/
      }
      .f_30{
      font-size: 30px;
      }
      .bhhh{
      height:50px;
      padding: 10px;
      }
      .red_hover:hover{
      color: blue;
      opacity: 100%;
      border-bottom: 2px red solid;
      }
      font {
        color: red;
        float: right;
      }
    </style>
    <div class="navbar  bg-light fixed-top">
      <div class="container-fluid ">
        <div class="float-start">
          <img src="../images/logo.png" class="rounded-pill border-1" height="50px" width="50px">
          <img src="../images/clinique_fso.png" class="rounded-pill border-1" height="40px" >
        </div>
        <div class="float-end">
          <button class="btn  red_hover" data-bs-toggle="collapse" href="#collapseOne">
          Nouveau patient
          </button>
          <button class="collapsed btn red_hover" data-bs-toggle="collapse" href="#collapseTwo">
          Modifier le dossier
          </button>
          
          <a href="../index.php" type="button" class="btn btn-default btn-sm border-0 rounded-2 bg-transparent">
          <i class="fa-solid fa-arrow-right-from-bracket"></i> Sortir
          </a>
        </div>
      </div>
    </div>
    <div class="row  bg-light mt-5  p-0 m-0 ">
    <div class="col-3 m-0 ">
      <div id="sidebar" class="bg-light col-3 m-0">
        <div class="pt-5">
          <a href="#" class="img logo rounded-circle mb-3" style="background-image: url(<?php echo $_SESSION['img_membre']; ?>);"></a>
          <div class="bg-light text-secondary text-center  rounded-2  " >
            <div class=" mx-3 py-3 btn_hover x">
              <?php echo $_SESSION['nom_membre']; ?>
            </div>
            <div class=" mx-3 py-3 btn_hover x">
              <?php echo $_SESSION['type_membre']; ?>
            </div>
            <div class=" mx-3 py-3 btn_hover x">
              <?php echo $_SESSION['specialite_membre']; ?>
            </div>
            
          </div>
        </div>
        <div class="m-4 text-center mb-3">
        </div>
      </div>
    </div>
    <div class="col-9 border-left">
      <br>
      <div id="accordion">
<?php 
/* Insertion le nouveau patient Début ************************************************************/
  if(isset($_POST['ajouter_patient']) ){
    if(!empty($_POST['nom_patient']) &&
        !empty($_POST['cin_patient']) &&
        !empty($_POST['tel_patient'])&&
        !empty($_POST['securite_sociale_patient'])  && 
        !empty($_POST['mutuelle_patient']) &&
        !empty($_POST['nom_contact']) &&
        !empty($_POST['cin_contact']) &&
        !empty($_POST['tel_contact']) &&
        !empty($_POST['relation_contact']) &&
        !empty($_POST['adresse_contact']) && 
        $_POST['prestation_patient'] != 'null' &&
        $_POST['chambre_patient'] != 'null' 
      ){
        $nom_patient = $_POST['nom_patient'] ;
        $cin_patient = $_POST['cin_patient'] ;
        $tel_patient = $_POST['tel_patient'] ;
        $securite_sociale_patient = $_POST['securite_sociale_patient'] ;
        $mutuelle_patient = $_POST['mutuelle_patient'] ;
        $prestation_patient = $_POST['prestation_patient'];
        $chambre_patient = $_POST['chambre_patient'];
        $nom_contact = $_POST['nom_contact'];
        $cin_contact = $_POST['cin_contact'];
        $tel_contact = $_POST['tel_contact'];
        $relation_contact = $_POST['relation_contact'];
        $adresse_contact = $_POST['adresse_contact'];

        $sql_exist_cin = "select * from patients where cin_patient = '$cin_patient'";
        $res_exist_cin = $bd->query($sql_exist_cin);
        if(mysqli_num_rows($res_exist_cin) < 1 ){
          $sql_contact = "insert into personnes_contact (nom, cin, tel, adresse, relation) values ('$nom_contact','$cin_contact','$tel_contact','$adresse_contact','$relation_contact') ";
          $res_contact = $bd->query($sql_contact);
          if($res_contact){
            $sql_last_pers = "select max(id) as mx from personnes_contact";
            $res_last_pers = $bd->query($sql_last_pers);

            $id = $res_last_pers->fetch_assoc();
            $id_contact = $id['mx'];
            $etat_patient = "entrer";
            $sql_patient = "insert into patients (nom_patient , tel_patient , chambre_patient , securite_sociale_patient ,  mutuelle_patient , personne_contacter , etat_patient , cin_patient,prestation_patient) values ('$nom_patient','$tel_patient','$chambre_patient','$securite_sociale_patient','$mutuelle_patient','$id_contact','$etat_patient','$cin_patient','$prestation_patient') ";
            $res_patient = $bd->query($sql_patient);
            if($res_patient){
              $sql_chambre_update = "update chambres set etat_chambre='indisponible' where num_chambre = '$chambre_patient' ";
              $res_chambre_update = $bd->query($sql_chambre_update);
              if($res_chambre_update){
                ?>
                  <div class="alert alert-success p-1 text-center">
                    Enregistré avec succes.
                  </div>
                <?php
              }
              else{
                echo $bd->error;
              }
            }
            else{
              echo $bd->error;
            }
          }
        }
        else{
          ?>
            <div class="alert alert-danger h6 p-2 text-center">
              C.I.N déja existe , essayer de modifier le dossier. 
            </div> 
          <?php
        }
    }
    else{

      ?>
         <div class="alert alert-danger h6 p-2 text-center">
          Tous les champs sont obligatoire.
        </div> 
      <?php
    }


    /*echo '<script type="text/javascript">alert("ok");</script>';*/
  }
/* Insertion le nouveau patient Fin ************************************************************/

/****** Traitement de nouveaux informations Debut :::: ***********************/
/*if(isset($_POST['btn_enregistrer_nv_infos_<?php echo $patients['id_patient']; ?>']))*/
$sql_afficher_patients_ = "select * from patients where etat_patient = 'entrer' ";
$res_afficher_patients_ = $bd->query($sql_afficher_patients_);
$msg = "";
if(mysqli_num_rows($res_afficher_patients_) >= 1){
  while ($patients_=$res_afficher_patients_->fetch_assoc()) {
    $btnn ='btn_enregistrer_nv_infos_'.$patients_["id_patient"];
    if(isset($_POST[$btnn])){
      /*Nom */
      $btn_ ='nom_patient_nv_'.$patients_["id_patient"]; 
      $id_patient__ = $patients_["id_patient"];
      if(!empty($_POST[$btn_]) ){
        $nom_nv = $_POST[$btn_];
        $sql_update = "update patients set nom_patient = '$nom_nv' where id_patient = '$id_patient__'  ";
        $res_update = $bd->query($sql_update);
        if($res_update){
          $msg = $msg."<br> * ) Nom : ".$nom_nv;
        }
        else{
          $msg = $msg."<br> * ) Erroe du Nom : ".$bd->error;
        }
        
      }
      /*cin */
      $btn_ ='cin_patient_nv_'.$patients_["id_patient"]; 
      if(!empty($_POST[$btn_]) ){
        $cin_nv = $_POST[$btn_];
        $sql_update = "update patients set cin_patient = '$cin_nv' where id_patient = '$id_patient__'  ";
        $res_update = $bd->query($sql_update);
        if($res_update){
          $msg = $msg."<br> * ) cin : ".$cin_nv;
        }
        
      }

      /*tel */
      $btn_ ='tel_patient_nv_'.$patients_["id_patient"]; 
      if(!empty($_POST[$btn_]) ){
        $tel_nv = $_POST[$btn_];
        $sql_update = "update patients set tel_patient = '$tel_nv' where id_patient = '$id_patient__'  ";
        $res_update = $bd->query($sql_update);
        if($res_update){
          $msg = $msg."<br> * ) tel : ".$tel_nv;
        }
      }

      /*securite_sociale */
      $btn_ ='securite_sociale_patient_nv_'.$patients_["id_patient"]; 
      if(!empty($_POST[$btn_]) ){
        $securite_sociale_nv = $_POST[$btn_];
        $sql_update = "update patients set securite_sociale_patient = '$securite_sociale_nv' where id_patient = '$id_patient__'  ";
        $res_update = $bd->query($sql_update);
        if($res_update){
          $msg = $msg."<br> * ) Securite Sociale : ".$securite_sociale_nv;
        }
        
      }

      /*mutuelle */
      $btn_ ='mutuelle_patient_nv_'.$patients_["id_patient"]; 
      if(!empty($_POST[$btn_]) ){
        $mutuelle_nv = $_POST[$btn_];
        $sql_update = "update patients set cin_patient = '$cin_nv' where id_patient = '$id_patient__'  ";
        $res_update = $bd->query($sql_update);
        if($res_update){
          $msg = $msg."<br>* ) Mutuelle : ".$mutuelle_nv;
        }
        
      }
      /* Personne à contacter : */
      $id_contact = $patients_['personne_contacter'];
      $msg_contact = "";
      /*Nom : */
      $btn_ ='nom_contact_nv_'.$patients_["id_patient"]; 
      if(!empty($_POST[$btn_]) ){
        $nom_contact_nv = $_POST[$btn_];
        $sql_update = "update personnes_contact set nom = '$nom_contact_nv' where id = '$id_contact'  ";
        $res_update = $bd->query($sql_update);
        if($res_update){
          $msg_contact = $msg_contact."<br>* ) Nom : ".$nom_contact_nv;
        }
      }

      /*Tel : */
      $btn_ ='tel_contact_nv_'.$patients_["id_patient"]; 
      if(!empty($_POST[$btn_]) ){
        $tel_contact_nv = $_POST[$btn_];
        $sql_update = "update personnes_contact set tel = '$tel_contact_nv' where id = '$id_contact'  ";
        $res_update = $bd->query($sql_update);
        if($res_update){
          $msg_contact = $msg_contact."<br>* ) Tél : ".$tel_contact_nv;
        }
      }

      /*cin : */
      $btn_ ='cin_contact_nv_'.$patients_["id_patient"]; 
      if(!empty($_POST[$btn_]) ){
        $cin_contact_nv = $_POST[$btn_];
        $sql_update = "update personnes_contact set cin = '$cin_contact_nv' where id = '$id_contact'  ";
        $res_update = $bd->query($sql_update);
        if($res_update){
          $msg_contact = $msg_contact."<br>* ) CIN : ".$cin_contact_nv;
        }
      }

      /*adresse : */
      $btn_ ='adresse_contact_nv_'.$patients_["id_patient"]; 
      if(!empty($_POST[$btn_]) ){
        $adresse_contact_nv = $_POST[$btn_];
        $sql_update = "update personnes_contact set adresse = '$adresse_contact_nv' where id = '$id_contact'  ";
        $res_update = $bd->query($sql_update);
        if($res_update){
          $msg_contact = $msg_contact."<br>* ) adresse : ".$adresse_contact_nv;
        }
      }

      /*relation : */
      $btn_ ='relation_contact_nv_'.$patients_["id_patient"]; 
      if(!empty($_POST[$btn_]) ){
        $relation_contact_nv = $_POST[$btn_];
        $sql_update = "update personnes_contact set relation = '$relation_contact_nv' where id = '$id_contact'  ";
        $res_update = $bd->query($sql_update);
        if($res_update){
          $msg_contact = $msg_contact."<br>* ) relation : ".$relation_contact_nv;
        }
      }


      if($msg_contact != ""){
        $msg = $msg."<br>Personne à contacter : ".$msg_contact;
      }


      if($msg != ""){
      ?>
        <div class="alert-success alert p-2 h6">
          Enregistrer avec succes : <?php echo $msg; ?><br>
          <form method="POST" action="main_page.php" class="float-start ">
              <button class="btn-success border-0 rounded-3 px-2">OK</button>
            </form>
        </div>
      <?php 
      }
      else{
        ?>
          <div class="alert-danger alert p-2 h6">
            Aucune modification Enregistrer. <br>
            Tous les champs sont vide.<br>
            <form method="POST" action="main_page.php" class="float-start ">
              <button class="btn-success border-0 rounded-3 px-2">OK</button>
            </form>
          </div>
          
        <?php 
      }
    }

  }
}


/****** Traitement de nouveaux informations Fin :::: ***********************/



?>
        <!-- Pour Ajouter Patient  Debut ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div class="card  border-0">
          <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
            <div class="card-body">
              <h6 class="">Remplir les informations du nouveau patient</h6>
              <hr>
              <form method="POST">
                <div>
                  <div class="m-4">

                    <div class="input-group border-1 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2 rounded-2 col-3">Nom Complet</span>
                      <input type="text" name="nom_patient" class="form-control m-2 rounded-2" placeholder="Nom...">   
                    </div>

                    <div class="input-group border-1 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2 rounded-2 col-3">C.I.N</span>
                      <input type="text" name="cin_patient" class="form-control m-2 rounded-2" placeholder="Numero de la carte Nationale .">   
                    </div>

                    <div class="input-group border-1 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2 rounded-2 col-3">
                        Tel
                      </span>
                      <input type="text" name="tel_patient" class="form-control m-2 rounded-2" placeholder="(05/06/07) XX XX XX XX ">   
                    </div>

                    <div class="input-group border-1 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2 rounded-2 col-3">Sécurité sociale</span>
                      <input type="text" name="securite_sociale_patient" class="form-control m-2 rounded-2" placeholder="Sécurité sociale .....">   
                    </div>

                    <div class="input-group border-1 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2 rounded-2 col-3">Mutuelle</span>
                      <input type="text" name="mutuelle_patient" class="form-control m-2 rounded-2" placeholder="Mutuelle ...">
                    </div>

                    <div class="input-group border-0 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2  rounded-2 col-3">Prestation</span>
                      <select class="form-select m-2 rounded-2" name="prestation_patient">
                        <option value="null" >Choisir la prestation</option>
                        <option value="Cardiologie" >Cardiologie</option>
                        <option value="Chirurgie" >Chirurgie Infantile /Pédiatrique</option>
                        <option value="Chirurgie" >Chirurgie Maxillo Faciale</option>
                        <option value="Chirurgie" >Chirurgie réparatrice et plastique</option>
                        <option value="Chirurgie" >Chirurgie thoracique</option>
                        <option value="Dermatologie" >Dermatologie</option>
                        <option value="Endocrinologie" >Endocrinologie</option>
                        <option value="Gastro" >Gastro-Entérologie</option>
                        <option value="Hématologie" >Hématologie</option>
                        <option value="Médecine" >Médecine interne</option>
                        <option value="Neuro" >Neuro-chirurgie</option>
                        <option value="Neurologie" >Neurologie</option>
                        <option value="Pédiatrie" >Pédiatrie</option>
                        <option value="Traumatologie" >Traumatologie</option>
                        <option value="Urologie" >Urologie</option>
                        <option value="Ophtalmologie" >Ophtalmologie</option>
                        <option value="Oto" >Oto-Rhino-Laryngologie</option>
                        <option value="Chirurgie" >Chirurgie générale</option>
                        <option value="Gynéco" >Gynéco-Obstétrique</option>
                        <option value="Néphrologie" >Néphrologie</option>
                        <option value="Psychiatrie" >Psychiatrie</option>
                        <option value="Rhumatologie" >Rhumatologie</option>
                        <option value="Médecine" >Médecine physique</option>
                      </select>
                    </div>

                    <div class="input-group border-0 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2  rounded-2 col-3">Chambre</span>
                      
                        <?php 
                          $sql_chambres = "select * from chambres where etat_chambre='disponible'";
                          $res_chambres = $bd->query($sql_chambres);
                          if(mysqli_num_rows($res_chambres) >=1){
                            ?>
                            <select class="form-select m-2 rounded-2" name="chambre_patient">
                              <option value="null" class="">Choisir la chambre</option>
                            <?php
                            while ($chambre = $res_chambres->fetch_assoc()) {
                              ?>
                                  <option value="<?php echo $chambre['num_chambre']; ?>" >
                                    <?php echo "Chambre N° : ".$chambre['num_chambre']; ?>
                                  </option>
                              <?php
                            }
                            ?>
                            </select>
                            <?php
                          }
                          else{
                          ?>
                              <input type="text"  disabled class="alert alert-danger form-control m-2 rounded-2" placeholder="Aucune chambre disponible.">
                          <?php
                          }
                        ?>
                         
                    </div>
                  </div>
                  <h6 class="">Personne à contacter</h6>
                  <hr>
                  <div class="m-4">
                    <div class="input-group border-1 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2 rounded-2 col-3">Nom Complet</span>
                      <input type="text" class="form-control m-2 rounded-2" name="nom_contact" placeholder="Nom...">   
                    </div>

                    <div class="input-group border-1 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2 rounded-2 col-3">C.I.N</span>
                      <input type="text" class="form-control m-2 rounded-2" name="cin_contact" placeholder="Numéro de la carte nationale ...">   
                    </div>


                    <div class="input-group border-1 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2 rounded-2 col-3">Relation</span>
                      <input type="text" class="form-control m-2 rounded-2" name="relation_contact" placeholder="Père - Mère - Frère ....">   
                    </div>

                    <div class="input-group border-1 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2 rounded-2 col-3">Téléphone </span>
                      <input type="text" class="form-control m-2 rounded-2" name="tel_contact" placeholder="Numéro de tel...">   
                    </div>

                    <div class="input-group border-1 p-0 rounded-3 col-10">
                      <span class="input-group-text border-0 m-2 rounded-2 col-3">Adresse</span>
                      <input type="text" class="form-control m-2 rounded-2" name="adresse_contact" placeholder="Adresse....">   
                    </div>

                  </div>
                  <br>
                  <button name="ajouter_patient" class="float-start btn btn-primary  ">
                    Ajouter
                  </button>
                  <br><br><br>
              </form>
              </div>
            </div>
          </div>
<!-- Pour Ajouter Patient  Fin ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<!-- Modifier Dossier Patient  Debut +++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

          <div class="card  border-0">
            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
              <div class="card-body">
                <h6 class="">Modifier les informations du patient</h6>
                <hr>
                
                  <table id="example" class="w-100 table table-hover">
                    <thead>
                      <tr>
                        <th>Nom du Patient</th>
                        <th>Chambre</th>
                        <th>C.I.N</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $sql_afficher_patients = "select * from patients where etat_patient = 'entrer' ";
                        $res_afficher_patients = $bd->query($sql_afficher_patients);
                        if(mysqli_num_rows($res_afficher_patients) >= 1){
                          while ($patients=$res_afficher_patients->fetch_assoc()) {
                            ?>
                              <tr>
                                <td><i class="fa-solid fa-user text-secondary"></i> <?php echo $patients['nom_patient']; ?></td>
                                <td><?php echo $patients['chambre_patient']; ?></td>
                                <td><?php echo $patients['cin_patient']; ?></td>
                                <td>
                                  <button class="btn border-1 p-0 px-1 border-primary text-primary m-1 h6 " data-bs-toggle="modal" data-bs-target="#modifier_patient_<?php echo $patients['id_patient']; ?>">
                                    <i class="fa-solid fa-file-pen "></i>
                                    Modifier le dossier
                                  </button>
                                  <!-- Modal pour modifier le patient debut ************************ -->
                                  <form method="POST" >
                                    <div class="modal fade " id="modifier_patient_<?php echo $patients['id_patient']; ?>">
                                      <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <div class="modal-title  ">
                                              <h5 class="text-center" >Veuillez Remplir les champs pour les moveaux données</h5>
                                            </div>
                                            <!-- <div class="btn-close float-end"  data-bs-dismiss="modal" ></div> -->
                                          </div>
                                          <div class="modal-body m-4">
                                            <div class="input-group border-1 p-0 rounded-3 col-10">
                                              <span class="input-group-text border-0 m-2 rounded-2 col-3">Nom complet</span>
                                              <input type="text" name="nom_patient_nv_<?php echo $patients['id_patient']; ?>" class="form-control m-2 rounded-2" placeholder="Nom...">   
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10">
                                              <span class="input-group-text border-0 m-2 rounded-2 col-3">C.I.N</span>
                                              <input type="text" name="cin_patient_nv_<?php echo $patients['id_patient']; ?>" class="form-control m-2 rounded-2" placeholder="Numero de la carte Nationale .">   
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10">
                                              <span class="input-group-text border-0 m-2 rounded-2 col-3">
                                                Tel
                                              </span>
                                              <input type="text" name="tel_patient_nv_<?php echo $patients['id_patient']; ?>" class="form-control m-2 rounded-2" placeholder="(05/06/07) XX XX XX XX ">   
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10">
                                              <span class="input-group-text border-0 m-2 rounded-2 col-3">Sécurité sociale</span>
                                              <input type="text" name="securite_sociale_patient_nv_<?php echo $patients['id_patient']; ?>" class="form-control m-2 rounded-2" placeholder="Sécurité sociale .....">   
                                            </div>
                                            <div class="input-group border-1 p-0 rounded-3 col-10">
                                              <span class="input-group-text border-0 m-2 rounded-2 col-3">Mutuelle</span>
                                              <input type="text" name="mutuelle_patient_nv_<?php echo $patients['id_patient']; ?>" class="form-control m-2 rounded-2" placeholder="Mutuelle ...">
                                            </div>

                                            <div class="input-group border-0 p-0 rounded-3 col-10">
                                              <span class="input-group-text border-0 m-2  rounded-2 col-3">Prestation</span>
                                              <select class="form-select m-2 rounded-2" name="prestation_patient_nv_<?php echo $patients['id_patient']; ?>">
                                                <option value="Cardiologie" >Cardiologie</option>
                                                <option value="Chirurgie" >Chirurgie Infantile /Pédiatrique</option>
                                                <option value="Chirurgie" >Chirurgie Maxillo Faciale</option>
                                                <option value="Chirurgie" >Chirurgie réparatrice et plastique</option>
                                                <option value="Chirurgie" >Chirurgie thoracique</option>
                                                <option value="Dermatologie" >Dermatologie</option>
                                                <option value="Endocrinologie" >Endocrinologie</option>
                                                <option value="Gastro" >Gastro-Entérologie</option>
                                                <option value="Hématologie" >Hématologie</option>
                                                <option value="Médecine" >Médecine interne</option>
                                                <option value="Neuro" >Neuro-chirurgie</option>
                                                <option value="Neurologie" >Neurologie</option>
                                                <option value="Pédiatrie" >Pédiatrie</option>
                                                <option value="Traumatologie" >Traumatologie</option>
                                                <option value="Urologie" >Urologie</option>
                                                <option value="Ophtalmologie" >Ophtalmologie</option>
                                                <option value="Oto" >Oto-Rhino-Laryngologie</option>
                                                <option value="Chirurgie" >Chirurgie générale</option>
                                                <option value="Gynéco" >Gynéco-Obstétrique</option>
                                                <option value="Néphrologie" >Néphrologie</option>
                                                <option value="Psychiatrie" >Psychiatrie</option>
                                                <option value="Rhumatologie" >Rhumatologie</option>
                                                <option value="Médecine" >Médecine physique</option>
                                              </select>
                                            </div>
                                            <div class="input-group border-0 p-0 rounded-3 col-10">
                                              <span class="input-group-text border-0 m-2  rounded-2 col-3">Chambre</span>
                                              
                                                <?php 
                                                  $sql_chambres = "select * from chambres where etat_chambre='disponible'";
                                                  $res_chambres = $bd->query($sql_chambres);
                                                  if(mysqli_num_rows($res_chambres) >=1){
                                                    ?>
                                                    <select class="form-select m-2 rounded-2" name="chambre_patient_nv_<?php echo $patients['id_patient']; ?>">
                                                    <?php
                                                    while ($chambre = $res_chambres->fetch_assoc()) {
                                                      ?>
                                                          <option value="<?php echo $chambre['num_chambre']; ?>" >
                                                            <?php echo "Chambre N° : ".$chambre['num_chambre']; ?>
                                                          </option>
                                                      <?php
                                                    }
                                                    ?>
                                                    </select>
                                                    <?php
                                                  }
                                                  else{
                                                  ?>
                                                      <input type="text"  disabled class="alert alert-danger form-control m-2 rounded-2" placeholder="Aucune chambre disponible.">
                                                  <?php
                                                  }
                                                ?>
                                                 
                                            </div>
                                            <h6 class="">Personne à contacter</h6>
                                              <hr>
                                              <div class="m-4">
                                                <div class="input-group border-1 p-0 rounded-3 col-10">
                                                  <span class="input-group-text border-0 m-2 rounded-2 col-3">Nom Complet</span>
                                                  <input type="text" class="form-control m-2 rounded-2" name="nom_contact_nv_<?php echo $patients['id_patient']; ?>" placeholder="Nom...">   
                                                </div>

                                                <div class="input-group border-1 p-0 rounded-3 col-10">
                                                  <span class="input-group-text border-0 m-2 rounded-2 col-3">C.I.N</span>
                                                  <input type="text" class="form-control m-2 rounded-2" name="cin_contact_nv_<?php echo $patients['id_patient']; ?>" placeholder="Numéro de la carte nationale ...">   
                                                </div>


                                                <div class="input-group border-1 p-0 rounded-3 col-10">
                                                  <span class="input-group-text border-0 m-2 rounded-2 col-3">Relation</span>
                                                  <input type="text" class="form-control m-2 rounded-2" name="relation_contact_nv_<?php echo $patients['id_patient']; ?>" placeholder="Père - Mère - Frère ....">   
                                                </div>

                                                <div class="input-group border-1 p-0 rounded-3 col-10">
                                                  <span class="input-group-text border-0 m-2 rounded-2 col-3">Téléphone </span>
                                                  <input type="text" class="form-control m-2 rounded-2" name="tel_contact_nv_<?php echo $patients['id_patient']; ?>" placeholder="Nom...">   
                                                </div>

                                                <div class="input-group border-1 p-0 rounded-3 col-10">
                                                  <span class="input-group-text border-0 m-2 rounded-2 col-3">Adresse</span>
                                                  <input type="text" class="form-control m-2 rounded-2" name="adresse_contact_nv_<?php echo $patients['id_patient']; ?>" placeholder="Adresse....">   
                                                </div>

                                              </div>
                                            </div>
                                          <div class="modal-footer">
                                            <button  class="btn  btn-success opacity-75" name="btn_enregistrer_nv_infos_<?php echo $patients['id_patient']; ?>" >Enregistrer</button>
                                            <div class="btn btn-danger opacity-75" data-bs-dismiss="modal"  >Annuler</div>
                                          </div>
                                        </div>
                                        
                                      </div>
                                      
                                    </div>
                                  </form>
                                  <!-- Modal pour modifier le patient Fin *********************** -->

                                </td>
                              </tr>
                              

                            <?php
                          }
                        }
                      ?>
                      
                      
                    </tbody>
                    
                  </table>
              </div>
            </div>
          </div>
<!-- Pour Ajouter Patient  Fin ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        </div>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="../table/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
  </body>
  

</html>
<?php 



?>

