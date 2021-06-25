
<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPatient.php';

class ControllerPatient {

 // --- Liste des patient
 public static function patientReadAll() {
  $results = ModelPatient::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un patient
 public static function patientCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau patient.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function patientCreated() {
  // ajouter une validation des informations du formulaire
  $results = Modelpatient::insert(htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInserted.php';
  require ($vue);
 }
 
  public static function patientReadId($args){
  $results = ModelPatient::getAllId();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewId.php';
  require ($vue);
 }
 
 public static function patientVaccination(){
    $id = $_GET['id'];
    $injection = 0;
    $vaccin_id = 0;
    $doses = 0;
    $results = ModelPatient::getInformation($id);
    if($results){
        foreach ($results as $element) {
            $injection = $element['injection'];
            $vaccin_id = $element['vaccin_id'];
            $doses = $element['doses'];
        }
    }

    include 'config.php';
    
    if($injection ==0){
        $allcentres = ModelPatient::getAllCentre();
        $vue = $root . '/app/view/patient/viewVaccination_0.php';
    }else{
        if($injection >= $doses){
            $vaccinInfo = ModelPatient::getOne($vaccin_id);
            $vue = $root . '/app/view/patient/viewVaccination_n.php';
        }else{
            $specialCentre = ModelPatient::getSpecialCentre($vaccin_id, $injection);
            if($specialCentre){
                $vue = $root . '/app/view/patient/viewVaccination_1.php';
            } else {
                $vue = $root . '/app/view/patient/viewVaccination_1_non.php';
            }
        }
    }
    require ($vue);
 }
 
 public static function patientResult_0(){
    $centre_id = $_GET['id'];
    $patient_id = $_GET['patient_id'];
     
    $results = ModelPatient::modifierType_0($centre_id, $patient_id);
     
    include 'config.php';
    $vue = $root . '/app/view/patient/viewResult_0.php';
    require ($vue);
 }
 
  public static function patientResult_1(){
    $centre_id = $_GET['id'];
    $patient_id = $_GET['patient_id'];
    $vaccin_id = $_GET['vaccin_id'];
    $injection = $_GET['injection'];
    
    $results = ModelPatient::modifierType_1($centre_id, $patient_id, $injection, $vaccin_id);
     
    include 'config.php';
    $vue = $root . '/app/view/patient/viewResult_1.php';
    require ($vue);
 }
}
?>
<!-- ----- fin ControllerPatient -->


