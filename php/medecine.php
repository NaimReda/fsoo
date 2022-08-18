<?php 
  include 'bd.php';
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Medecine</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../table/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/style.css">
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
          Les comptes rendus
          </button>
          <button class="collapsed btn red_hover" data-bs-toggle="collapse" href="#collapseTwo">
          Les patients
          </button>
          <!-- <button class="collapsed btn red_hover" data-bs-toggle="collapse" href="#collapseThree">
            Les infermeries
            </button>
            <button class="collapsed btn red_hover" data-bs-toggle="collapse" href="#collapseFour">
            Les secretaires
            </button>
            <button class="collapsed btn red_hover" data-bs-toggle="collapse" href="#collapseFive">
            Statistiques
            </button>-->
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
          <!-- Comptes Rendus Debut -->
          <div class="card  border-0">
            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
              <div class="card-body">
                <h6 class="">Les comptes rendus</h6>
                <hr>
                <table id="example1" class="w-100 table table-hover ">
                  <thead>
                    <tr>
                      <th>N° Compte </th>
                      <th>C.I.N du Patient</th>
                      <th>La date </th>
                      <th>Description</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql_afficher_cr = "select * from comptes_rendu";
                      $res_afficher_cr = $bd->query($sql_afficher_cr);
                      if(mysqli_num_rows($res_afficher_cr) >= 1){
                        while ($cr = $res_afficher_cr->fetch_assoc()) {
                          ?>
                          <tr>
                            <td><?php echo $cr['num_compte']; ?></td>
                            <td>
                              <?php 
                                $idd = $cr['id_patient'];
                                $sql_afficher_p_cr = "select * from patients where id_patient = '$idd' "; 
                                $res_afficher_p_cr = $bd->query($sql_afficher_p_cr);
                                $p__ = $res_afficher_p_cr->fetch_assoc();
                                echo $p__['nom_patient'];
                              ?>
                            </td>
                            <td><?php echo $cr['date_compte']; ?></td>
                            <td>
                              <?php 
                                echo  substr($cr['description_compte'], 0 , 15 )." . . ."; 
                              ?>
                              
                            </td>
                            <td>
                            <form method="POST" action="telecharger.php">   
                                <button name="telecharger_CR_p<?php echo $cr['id_compte']; ?>" class="btn border-1 border-success m-1 text-success " >
                                  <i class="fa-solid fa-download"></i> PDF
                                </button>
                                <div class="btn border-1 border-primary text-primary m-1 h6 "  data-bs-target="#plus_CR_<?php echo $cr['id_compte']; ?>" data-bs-toggle="modal">
                                  Plus..
                                </div>
                            </form>   
                              
                  <!-- debut modal plus Compte rendu -->
                              <div class="modal fade " id="plus_CR_<?php echo $cr['id_compte']; ?>" >
                                      <div class="modal-dialog  modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <div class="modal-title">
                                              <h4>Compte rendu du : <?php echo $p__['nom_patient'];  ?> </h4>
                                            </div>
                                          </div>
                                          <div class="modal-body m-4">

                                            <div class="input-group border-1 p-0 rounded-3 col-10 border m-1">
                                              <span class="input-group-text border-0   col-5">N° du compte Rendu du :  </span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $cr['num_compte']; ?>
                                              </span>  
                                            </div>
                                            <div class="input-group border-1 p-0 rounded-3 col-10 border m-1">
                                              <span class="input-group-text border-0   col-5">Date  </span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $cr['date_compte']; ?>
                                              </span>  
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10 border m-1">
                                              <span class="input-group-text border-0   col-5">Crée par  </span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $p__['nom_patient']; ?>
                                              </span>  
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10 border m-1">
                                              <span class="input-group-text border-0   col-5">Description  </span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $cr['description_compte']; ?>
                                              </span>  
                                            </div>

                                            
                                          </div>
                                          <div class="modal-footer">
                                            <form method="POST" action="telecharger.php">   
                                              <button name="telecharger_CR_p<?php echo $cr['id_compte']; ?>" class="btn border-1 border-success m-1 text-success " >
                                                <i class="fa-solid fa-download"></i> PDF
                                              </button>
                                            </form> 
                                            <div class="btn btn-danger opacity-75" data-bs-dismiss="modal"  >
                                              Fermer
                                            </div>
                                          </div>
                                        </div>
                                        
                                      </div>
                                      
                                    </div>
                  <!-- Fin modal plus Compte rendu -->
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
          <!-- Comptes Rendus Fin  -->
          <!-- Les patients Debut  -->
          <div class="card  border-0">
            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
              <div class="card-body">
                <h6 class="">Les patients</h6>
                <hr>
                <table id="example2" class="w-100 table table-hover ">
                  <thead>
                    <tr>
                      <th>Nom du patient</th>
                      <th>C.I.N</th>
                      <th>Prestation </th>
                      <th>Chambre</th>
                      <th>Etat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql_afficher_patients = "select * from patients where etat_patient = 'entrer' ";
                      $res_afficher_patients = $bd->query($sql_afficher_patients);
                      if(mysqli_num_rows($res_afficher_patients) >= 1){
                        while ($patients = $res_afficher_patients->fetch_assoc()) {
                          ?>
                            <tr>
                              <td><?php echo $patients['nom_patient']; ?></td>
                              <td><?php echo $patients['cin_patient']; ?></td>
                              <td><?php echo $patients['prestation_patient']; ?></td>
                              <td><?php echo $patients['chambre_patient']; ?></td>
                              <td><?php echo $patients['etat_patient']; ?></td>
                              <td class="">
                                <button class="btn border-1 border-danger m-1 text-danger " data-bs-target="#supprimer_patient_<?php echo $patients['id_patient']; ?>" data-bs-toggle="modal">
                                  <i class="fa-solid fa-trash-can"></i> 
                                </button>   
                                <button class="btn border-1 border-primary text-primary m-1 h6 " name="plus_patient_<?php echo $patients['id_patient']; ?>" data-bs-target="#plus_patient_<?php echo $patients['id_patient']; ?>" data-bs-toggle="modal">
                                Plus..
                                </button>
                        <!-- Debut Modal plus patient ****************************** -->
                                <form method="POST" action="telecharger.php">
                                    <div class="modal fade " id="plus_patient_<?php echo $patients['id_patient']; ?>">
                                      <div class="modal-dialog  modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-body m-4">
                                            <div class="input-group border-1 p-0 rounded-3 col-10 border m-1">
                                              <span class="input-group-text border-0   col-3">Nom Complet</span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $patients['nom_patient']; ?>
                                              </span>  
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                              <span class="input-group-text border-0   col-3">C.I.N</span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $patients['cin_patient']; ?>
                                              </span>  
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                              <span class="input-group-text border-0   col-3">Tél</span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $patients['tel_patient']; ?>
                                              </span>  
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                              <span class="input-group-text border-0   col-3">Sécurité sociale</span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $patients['securite_sociale_patient']; ?>
                                              </span>  
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                              <span class="input-group-text border-0   col-3">Mutuelle</span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $patients['mutuelle_patient']; ?>
                                              </span>  
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                              <span class="input-group-text border-0   col-3">Prestation</span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $patients['prestation_patient']; ?>
                                              </span>  
                                            </div>

                                            <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                              <span class="input-group-text border-0   col-3">Chambre</span>
                                              <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                <?php echo $patients['chambre_patient']; ?>
                                              </span>  
                                            </div>
                                          </div>
                                          <h6 class="mx-3 mb-0">Personne à contacter</h6>
                                          <hr class="mx-2">
                                          <div class="m-4">

                                            <?php
                                              $id_pp = $patients['personne_contacter'];
                                              $sql_contact = "select * from personnes_contact where id = '$id_pp' ";
                                              $res_contact = $bd->query($sql_contact);
                                              if(mysqli_num_rows($res_contact)){
                                                while ($p_contact = $res_contact->fetch_assoc()) {
                                                  ?>
                                                    <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                                      <span class="input-group-text border-0   col-3">Nom Complet</span>
                                                      <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                        <?php echo $p_contact['nom']; ?>
                                                      </span>  
                                                    </div>

                                                    <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                                      <span class="input-group-text border-0   col-3">C.I.N</span>
                                                      <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                        <?php echo $p_contact['cin']; ?>
                                                      </span>  
                                                    </div>

                                                    <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                                      <span class="input-group-text border-0   col-3">Relation</span>
                                                      <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                        <?php echo $p_contact['relation']; ?>
                                                      </span>  
                                                    </div>

                                                    <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                                      <span class="input-group-text border-0   col-3">Tél</span>
                                                      <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                        <?php echo $p_contact['tel']; ?>
                                                      </span>  
                                                    </div>

                                                    <div class="input-group border-1 p-0 rounded-3 col-10 border  m-1">
                                                      <span class="input-group-text border-0   col-3">Adresse</span>
                                                      <span class=" rounded-2 p-1 mx-3 mt-1 ">
                                                        <?php echo $p_contact['adresse']; ?>
                                                      </span>  
                                                    </div>

                                                  <?php
                                                }
                                              }


                                             ?>
                                          </div>
                                          <div class="modal-footer">
                                            
                                            <button  class="btn btn-success" name="telecharger_infos_<?php echo $patients['id_patient']; ?>">
                                              <i class="fa-solid fa-download"></i> Les informations  PDF
                                            </button>
                                            <button class="btn btn-success" name="telecharger_CR_<?php echo $patients['id_patient']; ?>">
                                              <i class="fa-solid fa-download"></i> Les comptes rendus en  PDF
                                            </button>
                                            <div class="btn btn-danger opacity-75" data-bs-dismiss="modal"  >Fermer</div>
                                          </div>
                                        </div>
                                        
                                      </div>
                                      
                                    </div>
                                  </form>
                                  <!-- Fin modal plus  -->
                                  <!-- Debut Modal supprimer patient -->
                                <form method="POST" >
                                    <div class="modal fade " id="supprimer_patient_<?php echo $patients['id_patient']; ?>">
                                      <div class="modal-dialog  modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-body m-3">
                                            <h5 class="text-danger">
                                              si vous avez supprimer ce patient , c'est à dire il a terminer sa duree de hospitalisation ? 
                                            </h5>
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-success" name="accept_supprimer_patient_<?php echo $patients['id_patient']; ?>">
                                              OUI
                                            </button>
                                            <div class="btn btn-danger opacity-75" data-bs-dismiss="modal"  >Annuler</div>
                                          </div>
                                        </div>
                                        
                                      </div>
                                      
                                    </div>
                                  </form>
                                  <?php 
                                    $btn_supp = "accept_supprimer_patient_".$patients['id_patient']."";
                                    if(isset($_POST[$btn_supp])){
                                      $id_p_supp = $patients['id_patient'];
                                      $sql_supp_patient = "update patients set etat_patient = 'sortir' where id_patient = '$id_p_supp'";
                                      $res_supp_patient = $bd->query($sql_supp_patient);
                                      if($res_supp_patient){
                                        ?>
                                              <script type="text/javascript">
                                                alert("supprimer avec succes");
                                              </script>
                                            <?php
                                        /*$id_supp_contact = $patients['personne_contacter'];
                                        $sql_supp_contact = "delete from personnes_contact where id = '$id_supp_contact'";
                                        $res_supp_contact = $bd->query($sql_supp_contact);
                                        if($res_supp_contact){
                                          $sql_supp_CR = "delete from comptes_rendu where id_patient = '$id_p_supp' ";
                                          $res_supp_CR = $bd->query($sql_supp_CR);
                                          if($res_supp_CR){
                                            ?>
                                              <script type="text/javascript">
                                                alert("supprimer avec succes");
                                              </script>
                                            <?php
                                          }
                                          else{
                                            echo $bd->error;
                                          }
                                        }
                                        else{
                                          echo $bd->error;
                                        }*/
                                      }
                                      else{
                                        echo $bd->error;
                                      }
                                    }
                                  ?>
                                  <!-- Fin modal eupprimer patient -->

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
          <!-- Les patients Fin  -->
          <!-- les infermeries  Debut  -->
          <!-- <div class="card  border-0">
            <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
               <div class="card-body">
                  <h6 class="">Les infermeries</h6>
                  <hr>
                  <table id="example3" class="w-100 table table-hover ">
                     <thead>
                        <tr>
                           <th>N° Compte </th>
                           <th>Patient</th>
                           <th>La date </th>
                           <th>Description</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>34</td>
                           <td>Reda Naim</td>
                           <td>24 Juin 2022</td>
                           <td>Description</td>
                           <td>   
                              <button class="bg-transparent border-0 h6" name="">
                                 Plus..
                              </button>
                           </td>
                        </tr>
                        
                        
                     </tbody>
                 
                  </table>
                  
               </div>
            </div>
            </div> -->
          <!-- les infermeries  Fin  -->
          <!-- Les secretaires Debut  -->
          <!-- <div class="card  border-0">
            <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
               <div class="card-body">
                  <h6 class="">Les secretaires</h6>
                  <hr>
                  <table id="example4" class="w-100 table table-hover ">
                     <thead>
                        <tr>
                           <th>N° Compte </th>
                           <th>Patient</th>
                           <th>La date </th>
                           <th>Description</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>34</td>
                           <td>Reda Naim</td>
                           <td>24 Juin 2022</td>
                           <td>Description</td>
                           <td>   
                              <button class="bg-transparent border-0 h6" name="">
                                 Plus..
                              </button>
                           </td>
                        </tr>
                        
                        
                     </tbody>
                 
                  </table>
                  
               </div>
            </div>
            </div> -->
          <!-- les secretaires Fin  -->
          <!-- Statistiques Debut  -->
          <!--  <div class="card  border-0">
            <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
               <div class="card-body">
                  <h6 class="">Statistiques</h6>
                  <hr>
                  <table id="example5" class="w-100 table table-hover ">
                     <thead>
                        <tr>
                           <th>N° Compte </th>
                           <th>Patient</th>
                           <th>La date </th>
                           <th>Description</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>34</td>
                           <td>Reda Naim</td>
                           <td>24 Juin 2022</td>
                           <td>Description</td>
                           <td>   
                              <button class="bg-transparent border-0 h6" name="">
                                 Plus..
                              </button>
                           </td>
                        </tr>
                        
                        
                     </tbody>
                 
                  </table>
                  
               </div>
            </div>
            </div> -->
          <!-- Statistiques Fin  -->
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
         $('#example1').DataTable();
      });
      
      $(document).ready(function () {
         $('#example2').DataTable();
      });
      
      $(document).ready(function () {
         $('#example3').DataTable();
      });
      
      $(document).ready(function () {
         $('#example4').DataTable();
      });
      
      $(document).ready(function () {
         $('#example5').DataTable();
      });
      
    </script>
  </body>
</html>
