<?php

class ControllerDocumentation {

 public static function mesPropositions_1() {
  include 'config.php';
  $vue = $root . '/public/documentation/mesPropositions_1.php';
  if (DEBUG)
   echo ("ControllerCave : mesPropositions : vue = $vue");
  require ($vue);
 }

  public static function mesPropositions_2() {
  include 'config.php';
  $vue = $root . '/public/documentation/mesPropositions_2.php';
  if (DEBUG)
   echo ("ControllerCave : mesPropositions : vue = $vue");
  require ($vue);
 }
 
  public static function mesPropositions_3() {
  include 'config.php';
  $vue = $root . '/public/documentation/mesPropositions_3.php';
  if (DEBUG)
   echo ("ControllerCave : mesPropositions : vue = $vue");
  require ($vue);
 }
 
  public static function viewGlobal() {
  include 'config.php';
  $vue = $root . '/public/documentation/viewGlobal.php';
  if (DEBUG)
   echo ("ControllerCave : mesPropositions : vue = $vue");
  require ($vue);
 }
 
}
