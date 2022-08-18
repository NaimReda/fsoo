<?php 
  require 'bd.php';
 $infos = '<center><table>      <tr>        <td>           <img src="../images/logo.png"  height="50px" width="50px">        </td>        <td>                    <img src="../images/clinique_fso.png"  height="40px" >        </td>      </tr>    </table></center><br><hr>';
 /*Pour telecharger les infos --------------------------------------*/
$sql_patients = "select * from patients " ;
$res_patients = $bd->query($sql_patients);
      if(mysqli_num_rows($res_patients) >= 1 ){
      	while ($patients = $res_patients->fetch_assoc()) {
      		$btn_infos = "telecharger_infos_".$patients['id_patient'];
      		$btn_CR = "telecharger_CR_".$patients['id_patient'];

      		if(isset($_POST[$btn_infos])){
      			$id_pp = $patients['personne_contacter'];
		        $sql_contact = "select * from personnes_contact where id = '$id_pp' ";
		        $res_contact = $bd->query($sql_contact);
		        if(mysqli_num_rows($res_contact)){
		          while ($p_contact = $res_contact->fetch_assoc()) {
		          	$infos = $infos.'<center>      <h2 style="color:red;">Tous les informations de  : '.$patients['nom_patient'].' </h2>      <hr>      <table>        <tr>          <td>C.I.N</td>          <td>'.$patients['cin_patient'].'</td>        </tr>        <tr>          <td>Tél</td>          <td>'.$patients['tel_patient'].'</td>        </tr>        <tr>          <td>Sécurité sociale</td>          <td>'.$patients['securite_sociale_patient'].'</td>        </tr>        <tr>          <td>Mutuelle</td>          <td>'.$patients['mutuelle_patient'].'</td>        </tr>        <tr>          <td>Prestation</td>          <td>'.$patients['prestation_patient'].'</td>        </tr>        <tr>          <td>Chambre</td>          <td>'.$patients['chambre_patient'].'</td>        </tr>              </table></center><br><center>    <h4>Personne à contacter</h4>    <hr class="mx-2">    <table>      <tr>        <td>Nom Complet</td>        <td>'.$p_contact['nom'].'</td>      </tr>      <tr>        <td>C.I.N</td>        <td>'.$p_contact['cin'].'</td>      </tr>      <tr>        <td>Relation</td>        <td>'.$p_contact['relation'].'</td>      </tr>      <tr>        <td>Tél</td>        <td>'.$p_contact['tel'].'</td>      </tr>      <tr>        <td>Adresse</td>        <td>'.$p_contact['adresse'].'</td>      </tr>          </table>  </center> ';
  						}
        		}
      		}
      		else{
      			if(isset($_POST[$btn_CR])){
      				$id_p_cr = $patients['id_patient'];
      				$sql_CR = "select * from comptes_rendu where id_patient = '$id_p_cr' ";
      				$res_CR = $bd->query($sql_CR);
      				if(mysqli_num_rows($res_CR) >= 1){
      					$infos = $infos.'<center><h2 style="color:red;" >Tous les Comptes Rendu de  : '.$patients['nom_patient'].' </h2></center><hr>';
      					while ($cr = $res_CR->fetch_assoc() ) {
      						$id_membre_cr = $cr['id_membre'];
      						$sql_membre_cr = "select * from membres where id_membre = '$id_membre_cr' ";
      						$res_membre_cr = $bd->query($sql_membre_cr);
      						if(mysqli_num_rows($res_membre_cr) >= 1){
      							$membre = $res_membre_cr->fetch_assoc();
      							$infos = $infos.'<table>                        <tr>                          <td> Numéro du compte rendu : </td>                          <td>'.$cr['num_compte'].'</td>                          <td> Date : </td>                          <td>'.$cr['date_compte'].'</td>                        </tr>                        <tr>                          <td> Crée par  : </td>                          <td colspan="3">'.$membre['nom_membre'].'</td>                        </tr>                        <tr>                          <td> Description  : </td>                          <td colspan="3">'.$cr['description_compte'].'</td>                        </tr>                      </table>                      <hr>';
      							
      						}
      					}

      				}
      			}
      		}
      	}
      }

 /***************************************************************************/ 
 /*telecharger chaque compte rendu */
 $sql_CR = "select * from comptes_rendu";
      				$res_CR = $bd->query($sql_CR);
      				if(mysqli_num_rows($res_CR) >= 1){
      					while ($cr = $res_CR->fetch_assoc() ) {
      						$btn_CR__ = "telecharger_CR_p".$cr['id_compte'];
      						if(isset($_POST[$btn_CR__])){
      							$id_membre_cr = $cr['id_membre'];
	      						$id_patient_cr = $cr['id_patient'];
	      						$sql_membre_cr = "select * from membres where id_membre = '$id_membre_cr' ";
	      						$sql_patient_cr = "select * from patients where id_patient = '$id_patient_cr' ";
	      						$res_membre_cr = $bd->query($sql_membre_cr);
	      						$res_patient_cr = $bd->query($sql_patient_cr);
	      						if(mysqli_num_rows($res_membre_cr) >= 1 && mysqli_num_rows($res_patient_cr) >= 1 ){
	      							$membre = $res_membre_cr->fetch_assoc();
	      							$patient = $res_patient_cr->fetch_assoc();
	      							$infos = $infos.'<center><h2 style="color:red;" >Compte Rendu de  : '.$patient['nom_patient'].' </h2></center><hr><br>';
	      							$infos = $infos.'<table>                        <tr>                          <td> Numéro du compte rendu : </td>                          <td>'.$cr['num_compte'].'</td>                          <td> Date : </td>                          <td>'.$cr['date_compte'].'</td>                        </tr>                        <tr>                          <td> Crée par  : </td>                          <td colspan="3">'.$membre['nom_membre'].'</td>                        </tr>                        <tr>                          <td> Description  : </td>                          <td colspan="3"></td>                        </tr>  <tr><td> </td><td colspan="3">'.$cr['description_compte'].'</td></tr>                     </table>                     ';
	      							
	      						}
      						}
      					}

      				}
 /*******************************************************/
 /*Pour telecharger les comptes rendus*/
  
require '..\dompdf\autoload.inc.php';
 use FontLib\Font;
  	use Dompdf\Dompdf;
  	$dompdf = new Dompdf();
  	$dompdf->loadHtml($infos);
  
  	// (Optional) Setup the paper size and orientation
  	$dompdf->setPaper('A4', 'portrait');
  
  	// Render the HTML as PDF
  	$dompdf->render();
  
  	// Output the generated PDF to Browser
  	$dompdf->stream();
  			// instantiate and use the dompdf class
 
  ?>

<!-- <center>
      <h2>Tous les informations de  : '.$patients['nom_patient'].' </h2>
      <hr>

      <table>
        <tr>
          <td>C.I.N</td>
          <td>'.$patients['cin_patient'].'</td>
        </tr>
        <tr>
          <td>Tél</td>
          <td>'.$patients['tel_patient'].'</td>
        </tr>
        <tr>
          <td>Sécurité sociale</td>
          <td>'.$patients['securite_sociale_patient'].'</td>
        </tr>
        <tr>
          <td>Mutuelle</td>
          <td>'.$patients['mutuelle_patient'].'</td>
        </tr>
        <tr>
          <td>Prestation</td>
          <td>'.$patients['prestation_patient'].'</td>
        </tr>
        <tr>
          <td>Chambre</td>
          <td>'.$patients['chambre_patient'].'</td>
        </tr>
        
      </table>
</center>
<br>
<center>
    <h4>Personne à contacter</h4>
    <hr class="mx-2">
    <table>
      <tr>
        <td>Nom Complet</td>
        <td>'.$p_contact['nom'].'</td>
      </tr>
      <tr>
        <td>C.I.N</td>
        <td>'.$p_contact['cin'].'</td>
      </tr>
      <tr>
        <td>Relation</td>
        <td>'.$p_contact['relation'].'</td>
      </tr>
      <tr>
        <td>Tél</td>
        <td>'.$p_contact['tel'].'</td>
      </tr>
      <tr>
        <td>Adresse</td>
        <td>'.$p_contact['adresse'].'</td>
      </tr>
      
    </table>
  </center>   -->