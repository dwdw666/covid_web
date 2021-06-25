
<!-- ----- debut ControllerStocks -->
<?php
require_once '../model/ModelStock.php';

class ControllerStock {

 public static function centreReadAllStock() {
  $results = ModelStock::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAll.php';
  require ($vue);
 }

 public static function centreInventaire() {
  $results = ModelStock::getNombreGlobal();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAll.php';
  require ($vue);
 }

 public static function centreAttribution() {
    $results_centre = ModelStock::getCentreId();
    $results_vaccin = ModelStock::getVaccinId();
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/stock/viewId.php';
    require ($vue);
 }
 
  public static function centreAttributed(){
  $results_vaccin = ModelStock::getVaccinId();
  $centre_id = $_GET['centre_id'];
  $vaccin_list = array();
  foreach ($results_vaccin as $element) {
      $n =$element->getId();
      $vaccin_list[$n] = $_GET[$n];
  }
  
  foreach ($results_vaccin as $element) {
        $vaccin_id = $element->getId();
        if($vaccin_list[$vaccin_id] != 0){
            $flag = ModelStock::isExisted($centre_id, $vaccin_id);
            if($flag){
                ModelStock::update($centre_id, $vaccin_id, $vaccin_list[$vaccin_id]);
            }else{
                ModelStock::insert($centre_id, $vaccin_id, $vaccin_list[$vaccin_id]);
            }
        }  
        
            print("<br>");
  }
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewUpdated.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerStock -->


