<?php

class ControllerCave {

// --- page d'acceuil
 public static function covidAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.php';
  if (DEBUG)
   echo ("ControllerCave : caveAccueil : vue = $vue");
  require ($vue);
 }

 
}