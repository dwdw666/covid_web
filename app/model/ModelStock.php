
<!-- ----- debut Modelvaccin -->

<?php
require_once 'Model.php';

class ModelStock {
 private $centre_id, $quantite, $vaccin_id,$date;

 // pas possible d'avoir 2 constructeurs
 public function __construct($centre_id = NULL, $quantite = NULL, $vaccin_id = NULL, $date = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($centre_id)) {
   $this->centre_id = $centre_id;
   $this->quantite = $quantite;
   $this->vaccin_id = $vaccin_id;
   $this->date = $date;
  }
 }

 function getCentre_id() {
     return $this->centre_id;
 }

 function getQuantite() {
     return $this->quantite;
 }

 function getVaccin_id() {
     return $this->vaccin_id;
 }
 function getDate() {
     return $this->date;
 }

 function setCentre_id($centre_id) {
     $this->centre_id = $centre_id;
 }

 function setQuantite($quantite) {
     $this->quantite = $quantite;
 }

 function setVaccin_id($vaccin_id) {
     $this->vaccin_id = $vaccin_id;
 }
 function setDate($date) {
     $this->date = $date;
 }
 
 public static function transfer($statement){
   $cols = array();
   $datas = array();
   $count = $statement->columnCount();
   
   for ($i=0; $i<$count; $i++)
    {
        $column = $statement->getColumnMeta($i);
        array_push($cols,$column['name']);
    }
    
    while ($row = $statement->fetch(PDO::FETCH_OBJ)){
        $tuple = array();
        for ($i=0; $i<$count; $i++)
        {
            $column = $statement->getColumnMeta($i);
            $valeur = $row->$column['name'];
            array_push($tuple,$valeur);
        }
        array_push($datas,$tuple);
    }
    return array($cols,$datas);
 }
 
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "SELECT s.centre_id as id, c.label as centre_label, c.adresse as centre_adresse, v.label as vaccin_label, s.quantite as quantite
            FROM centre as c, stock as s, vaccin as v
            WHERE c.id = s.centre_id AND v.id = s.vaccin_id
            ORDER BY s.centre_id, v.label";
   $statement = $database->prepare($query);
   $statement->execute();

   return self::transfer($statement);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getNombreGlobal() {
  try {
   $database = Model::getInstance();
   $query = "SELECT c.label as label, SUM(s.quantite) as doses
            FROM centre as c, stock as s
            WHERE c.id = s.centre_id
            GROUP BY c.label
            ORDER BY SUM(s.quantite) DESC";
   $statement = $database->prepare($query);
   $statement->execute();

   return self::transfer($statement);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

  public static function getCentreId() {
  try {
   $database = Model::getInstance();
   $query = "select id, label from centre order by id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
   public static function getVaccinId() {
  try {
   $database = Model::getInstance();
   $query = "select id, label from vaccin order by id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
public static function isExisted($centre_id, $vaccin_id){
     try {
   $database = Model::getInstance();
   $query = "SELECT 1 FROM stock WHERE centre_id=".$centre_id." AND vaccin_id=".$vaccin_id." limit 1";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function insert($centre_id, $vaccin_id, $quantite,$date) {
  try {
   $database = Model::getInstance();
   // ajout d'un nouveau tuple;
   $query = "insert into stock value (:centre_id, :vaccin_id, :quantite, :date)";
   $statement = $database->prepare($query);
   $statement->execute([
     'centre_id' => $centre_id,
     'vaccin_id' => $vaccin_id,
     'quantite' => $quantite,
     'date' => $date
   ]);
   return 1;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 public static function update($centre_id, $vaccin_id, $quantite,$date) {
 try {
   $database = Model::getInstance();

   // ajout d'un nouveau tuple;
   $query = "UPDATE stock SET quantite=quantite + :quantite ,`date`= :date WHERE centre_id=:centre_id AND vaccin_id=:vaccin_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'centre_id' => $centre_id,
     'vaccin_id' => $vaccin_id,
     'quantite' => $quantite,
     'date' => $date
   ]);
   return 1;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
}
?>
<!-- ----- fin ModelVin -->
