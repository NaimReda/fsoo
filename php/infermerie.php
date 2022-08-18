<?php 
  include 'bd.php';
  
  session_start();
  
  
  ?>
<!doctype html>
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
    </style>
    <div class="navbar  bg-light fixed-top">
      <div class="container-fluid ">
        <div class="float-start">
          <img src="../images/logo.png" class="rounded-pill border-1" height="50px" width="50px">
          <img src="../images/clinique_fso.png" class="rounded-pill border-1" height="40px" >
        </div>
        <div class="float-end">
          <button class="btn  red_hover" data-bs-toggle="collapse" href="#collapseOne">
          Ajouter Compte Rendu
          </button>
          <button class="collapsed btn red_hover" data-bs-toggle="collapse" href="#collapseTwo">
          Tous les comptes rendu
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
          <!-- ****** Ajouter Compte Rendu -->
          <?php
            if(isset($_POST['ajouter_compte_rendu'])){
              if(!empty($_POST['cin_patient']) && !empty($_POST['description_compte'])){
                $cin_patient = $_POST['cin_patient'];
                $description_compte = $_POST['description_compte'];
                $sql = "select id_patient from patients where cin_patient = '$cin_patient' ";
                $res = $bd->query($sql);
                if(mysqli_num_rows($res) == 1){
                  $patients = $res->fetch_assoc();
                  $id_patient = $patients['id_patient'];
                  
                  /*le nombre des compte Debut..*/
                  $sql_comptes = "select max(num_compte) as m from comptes_rendu where id_patient = '$id_patient'";
                  $res_comptes = $bd->query($sql_comptes);

                  if(mysqli_num_rows($res_comptes) >= 1){
                    $max__ = $res_comptes->fetch_assoc();
                    $max_ = $max__['m']+1; 
                     
                  }
                  else{
                    echo $bd->error;
                  }
                  /*echo $max_;*/
                  /*le nombre des compte Fin..*/
                  $id_mem = $_SESSION['id_membre'];
                  $sql_insert_compte = "insert into comptes_rendu (id_membre,id_patient,date_compte,description_compte,num_compte) values ($id_mem,'$id_patient',now(),'$description_compte','$max_') ";
                  $res_insert_compte = $bd->query($sql_insert_compte);
                  if($res_insert_compte){
                    ?>
                      <div class="alert alert-success p-1 text-center">
                        Enregistré avec succes.
                      </div>
                    <?php
                  }
                }
                else{
                  ?>
                  <div class="alert alert-danger h6 py-2 px-4 ">
                    le C.I.N : <?php echo $cin_patient; ?> n'existe pas.<br>
                    réssayez avec uu autre C.I.N
                  </div> 

                  <?php
                }
              }
            } 
          ?>
          <!-- Compte Rendu Debut ******************************************* -->
          <div class="card  border-0">
            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
              <div class="card-body">
                <h6 class="">Remplir les informations du compte rendu</h6>
                <hr>
                <form method="POST">
                  <div class="input-group border-1 p-0 rounded-3 col-10">
                    <span class="input-group-text border-0 m-2 rounded-2 col-3">C.I.N</span>
                    <input type="text" name="cin_patient" class="form-control m-2 rounded-2" placeholder="Numero de la carte Nationale .">   
                  </div>
                  <div class="input-group border-1 p-0 rounded-3 col-10">
                    <span class="input-group-text border-0 m-2 rounded-2 col-3 h-50">
                    Description
                    </span>
                    <textarea name="description_compte" class="form-control m-2 rounded-2" > 
                    </textarea>  
                  </div>
                  <button name="ajouter_compte_rendu" class="float-start btn btn-primary ">
                    Enregistrer
                  </button>
                </form>
              </div>
            </div>
          </div>
          <!-- Compte Rendu Fin ******************************************* -->
          <!-- Compte Rendu Statistiques Début ******************************************* -->
          <div class="card  border-0">
            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
              <div class="card-body">
                <h6 class="">Les statistiques des Comptes Rendu</h6>
                <hr>
                <?php 
                  $sql_afficher_comptes = "select * from comptes_rendu ";
                  $res_afficher_comptes = $bd->query($sql_afficher_comptes);
                  if(mysqli_num_rows($res_afficher_comptes) >= 1){
                ?>
                <table id="example" class="w-100 table table-hover ">
                  <thead>
                    <tr>
                      <th>N° Compte </th>
                      <th>Patient</th>
                      <th>C.I.N</th>
                      <th>La date </th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      while ($comptes = $res_afficher_comptes->fetch_assoc()) {
                        ?>
                          <tr>
                            <td><?php echo $comptes['num_compte']; ?></td>
                            <td>
                              <?php 
                                $id_p_compte =  $comptes['id_patient'];
                                $sql_p_compte = "select * from patients where id_patient = '$id_p_compte'";
                                $res_p_compte = $bd->query($sql_p_compte);
                                if(mysqli_num_rows($res_p_compte) == 1){
                                  $nom_p = $res_p_compte->fetch_assoc();
                                  echo $nom_p['nom_patient'];
                                  $cin_p = $nom_p['cin_patient'];
                                } 
                              ?>
                              
                            </td>
                            <td><?php echo $cin_p; ?></td>
                            <td><?php echo $comptes['date_compte']; ?></td>
                            <td>
                                <?php 
                                  $desc = $comptes['description_compte'];
                                  $desc = substr($desc, 0 , 20 );
                                  echo $desc."... "
                                ?>
                            </td>
                            <td>   
                              <button class="btn border-1 border-primary text-primary m-1 h6 " name="plus_compte_<?php echo $comptes['id_compte'] ; ?>" data-bs-toggle="modal" data-bs-target="#plus_compte_modal_<?php echo $comptes['id_compte'] ; ?>">
                              Plus..
                              </button>
                              <!-- Modal afficher plus : compte rendu Debut -->
                              <form method="POST" >
                                    <div class="modal fade " id="plus_compte_modal_<?php echo $comptes['id_compte'] ; ?>">
                                      <div class="modal-dialog  modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <div class="modal-title  ">
                                              <h5 class="text-center" >Compte Rendu</h5>
                                            </div>
                                          </div>
                                          <div class="modal-body m-4">
                                            <div class="m-2 row border-1 rounded-2">
                                              <div class="col-3 mb-4">
                                                Numéro du C.R : 
                                              </div>
                                              <div class="col-3 h6">
                                                <?php echo $comptes['num_compte']; ?>
                                              </div>

                                              <div class="col-3 mb-4">
                                                Date du C.R : 
                                              </div>
                                              <div class="col-3 h6">
                                                <?php echo $comptes['date_compte']; ?>
                                              </div>

                                              <div class="col-3 mb-4">
                                                Nom du patient : 
                                              </div>
                                              <div class="col-9 h6 ">
                                                <?php echo  $nom_p['nom_patient']; ?>
                                              </div>

                                              <div class="col-3 mb-4">
                                                Numéro du C.R : 
                                              </div>
                                              <div class="col-9 h6">
                                                <?php echo $comptes['description_compte']; ?>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <div class="btn btn-danger opacity-75" data-bs-dismiss="modal"  >Fermer</div>
                                          </div>
                                        </div>
                                        
                                      </div>
                                      
                                    </div>
                                  </form>
                              <!-- Modal afficher plus : compte rendu Fin -->
                            </td>
                          </tr>
                        <?php
                      }


                    ?>
                  </tbody>
                </table>

                <?php
                  }
                  else{
                ?>
                    <div class="alert alert-danger h6 p-2 text-center">
                      Tous les champs sont obligatoire.
                    </div> 
                <?php
                  }
                ?>
                
              </div>
            </div>
          </div>
          <!-- Compte Rendu Statistiques Début ******************************************* -->
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