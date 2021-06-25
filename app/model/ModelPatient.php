
<!-- ----- debut ModelPatient -->

<?php
require_once 'Model.php';

class ModelPatient {
 private $id, $nom, $prenom, $adresse;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $nom = NULL,$prenom = NULL, $adresse = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->adresse = $adresse;
  }
 }

 function getId() {
     return $this->id;
 }

 function getNom() {
     return $this->nom;
 }

 function getPrenom() {
     return $this->prenom;
 }

 function getAdresse() {
     return $this->adresse;
 }
 
 function setId($id) {
     $this->id = $id;
 }

 function setNom($nom) {
     $this->nom = $nom;
 }

 function setPrenom($prenom) {
     $this->prenom = $prenom;
 }

 function setAdresse($adresse) {
     $this->adresse = $adresse;
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
   $query = "select * from patient";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPatient");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id, nom, prenom from patient order by id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPatient");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function insert($nom, $prenom, $adresse) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from patient";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into patient value (:id, :nom, :prenom, :adresse)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'adresse' => $adresse,
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function getInformation($id){
  try {
   $database = Model::getInstance();
   $query = "SELECT injection,vaccin_id,doses
            FROM rendezvous, vaccin
            WHERE patient_id = $id AND rendezvous.vaccin_id=vaccin.id
            ORDER BY injection DESC
            LIMIT 1";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getAllCentre(){
 try {
   $database = Model::getInstance();
   $query = "SELECT c.id, c.label as label, SUM(s.quantite) as doses
            FROM centre as c, stock as s
            WHERE c.id = s.centre_id
            GROUP BY c.label
            HAVING SUM(s.quantite) > 0
            ORDER BY c.id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function modifierType_0($centre_id, $patient_id){
     try {
   $database = Model::getInstance();
   $query = "SELECT v.id as vaccin_id,v.label as vaccin_label, c.label as centre_label, s.quantite as quantite
            FROM centre as c, stock as s, vaccin as v
            WHERE c.id = s.centre_id AND v.id = s.vaccin_id AND c.id = $centre_id
            ORDER BY quantite DESC
            LIMIT 1";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
    if($results){
        foreach ($results as $element) {
            $vaccin_id = $element['vaccin_id'];
            $vaccin_label = $element['vaccin_label'];
            $centre_label = $element['centre_label'];
            $quantite = $element['quantite'];
        }
    }
   
    $requete = "insert into rendezvous value ($centre_id, $patient_id, 1, $vaccin_id)";
    $database->query($requete);  
    
    $requete = "UPDATE stock SET quantite=quantite - 1 WHERE centre_id=$centre_id AND vaccin_id=$vaccin_id";
    $resultats = $database->query($requete);  
       
   return array($centre_label,$vaccin_label);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from vaccin where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static  function getSpecialCentre($vaccin_id){
 try {
   $database = Model::getInstance();
   $query = "SELECT c.id as id, c.label as label
            FROM centre as c, stock as s
            WHERE c.id = s.centre_id AND s.vaccin_id=:id AND s.quantite>0";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $vaccin_id
   ]);
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  } 
 }
 
 public static function modifierType_1($centre_id, $patient_id, $injection, $vaccin_id){
     try {
   $database = Model::getInstance();
   $injection = $injection + 1;
    $requete = "insert into rendezvous value ($centre_id, $patient_id, $injection, $vaccin_id)";
    $database->query($requete);  
       
   return $injection;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>
<!-- ----- fin ModelVin -->
