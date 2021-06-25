<?php
require_once '../model/ModelInnovation.php';
require_once '../model/ModelStock.php';

class ControllerInnovation {
 
 public static function innovation_1() {
  $results = ModelInnovation::getAll();
     
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewAllPatient.php';
  if (DEBUG)
   echo ("ControllerCave : mesPropositions : vue = $vue");
  require ($vue);
 }
 
  public static function innovation_2() {
  $results = ModelInnovation::getStock();    
  $results_centre = ModelStock::getCentreId();
  $results_vaccin = ModelStock::getVaccinId();    
      
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewStock.php';
  if (DEBUG)
   echo ("ControllerCave : mesPropositions : vue = $vue");
  require ($vue);
 }
 
 public static function attibutVaccin(){
    $results_vaccin = ModelStock::getVaccinId();
    $centre_id = $_GET['centre_id'];
    $vaccin_id = $_GET['vaccin_id'];
    $date = date("Y-m-d");
    $flag = ModelStock::isExisted($centre_id, $vaccin_id);
    if($flag){
        ModelStock::update($centre_id, $vaccin_id, 1,$date);
    }else{
        ModelStock::insert($centre_id, $vaccin_id, 1,$date);
    }
 
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewUpdated.php';
  require ($vue);
 
 }
 
  public static function innovation_3() {
  $results_1 = ModelInnovation::getConsommation_1();
  $results_2 = ModelInnovation::getConsommation_2();
  
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewConsommation.php';
  if (DEBUG)
   echo ("ControllerCave : mesPropositions : vue = $vue");
  require ($vue);
 }
 
}