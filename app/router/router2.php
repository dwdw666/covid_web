
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerCave.php');
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerInnovation.php');
require ('../controller/ControllerDocumentation.php');
// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- On supprime l'element action de la structure
unset($param['action']);

// --- Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
 case "vaccinReadAll" :
 case "vaccinCreate" :
 case "vaccinCreated":
 case "vaccinUpdate" :
 case "vaccinUpdated":
  ControllerVaccin::$action();
  break;

 case "centreCreate":
 case "centreCreated":
 case "centreReadAll":
  ControllerCentre::$action();
  break;

 case "patientCreate":
 case "patientCreated":
 case "patientReadAll":
  ControllerPatient::$action();
  break;

 case "centreReadAllStock":
 case "centreInventaire":
 case "centreAttribution":
 case "centreAttributed":
  ControllerStock::$action();
  break;

 case "patientReadId":
 case "patientVaccination":
 case "patientResult_0":
 case "patientResult_1":
  ControllerPatient::$action($args);
  break;

 case "innovation_1":
 case "innovation_2":
 case "attibutVaccin":
 case "innovation_3":
  ControllerInnovation::$action();
  break;     


 case "mesPropositions_1" :
 case "mesPropositions_2" :
 case "mesPropositions_3" :
 case "viewGlobal" :
  ControllerDocumentation::$action();
  break;

 // Tache par défaut
 default:
  $action = "covidAccueil";
  ControllerCave::$action();
}
?>
<!-- ----- Fin Router1 -->

