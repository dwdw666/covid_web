
<!-- ----- debut ModelCentre -->

<?php
require_once 'Model.php';

class ModelInnovation {

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "SELECT patient.nom as nom, patient.prenom as prenom, rendezvous.injection as injection, vaccin.label as vaccin, centre.label as centre, centre.adresse as adresse
            FROM patient, vaccin, rendezvous, centre
            WHERE rendezvous.centre_id=centre.id AND rendezvous.patient_id=patient.id AND rendezvous.vaccin_id=vaccin.id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getStock(){
  try {
   $database = Model::getInstance();
   $query = "SELECT s.centre_id as centre_id, c.label as centre_label, v.id as vaccin_id, v.label as vaccin_label, s.quantite as quantite, s.date as date
             FROM centre as c, stock as s, vaccin as v
            WHERE c.id = s.centre_id AND v.id = s.vaccin_id
            ORDER BY s.centre_id, v.label";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getConsommation_1(){
     try {
   $database = Model::getInstance();
   $query = "SELECT centre.id as id, centre.label as centre, centre.adresse as adresse, COUNT(*) as injection
            FROM vaccin, rendezvous, centre
            WHERE rendezvous.centre_id=centre.id AND rendezvous.vaccin_id=vaccin.id
            GROUP BY centre.label
            ORDER BY centre.id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getConsommation_2(){
     try {
   $database = Model::getInstance();
   $query = " SELECT centre.label as centre, vaccin.label as vaccin, COUNT(*) as vaccin_number
            FROM vaccin, rendezvous, centre
            WHERE rendezvous.centre_id=centre.id AND rendezvous.vaccin_id=vaccin.id
            GROUP BY centre.id, vaccin.id
            ORDER BY rendezvous.patient_id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 





}
?>
<!-- ----- fin ModelVin -->
