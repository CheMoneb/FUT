<?php

abstract class Model {
    protected PDO $pdo;
    
        

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=FUT', 'root', '');
    }
    
    public function findAll(){
        $query = "SELECT * FROM Players";
        $statement = $this->pdo->query($query);
        $statement->execute();
        $Players = $this->pdo->prepare($query);
        $Players = $statement->fetchAll(PDO::FETCH_ASSOC); 
        return $Players;

    }

    public function findBy($id){

        $query = "SELECT * FROM Players where ID = :ID";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':ID', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC); 
        return $result;

    }

    public function delete($id){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Players_id = $_POST['Players_id']; 

            $delete = "DELETE FROM Players WHERE ID = :Players_id";
            $stmt = $this->pdo->prepare($delete);
            $stmt->bindParam(':Players_id', $Players_id, PDO::PARAM_INT);
        
            if ($stmt->execute()) {
                echo "Joeur supprimé avec succès.";
            } else {
                echo "Erreur de suppression du Joeur.";
            }

            if ($stmt->execute()) {
                header("Location: ../index.php");
                exit;
            } else {
                echo "Error deleting Players.";
            }
        } else {
            echo "No Players ID specified.";
        }
       
    }
 
    public function create($Player){

        $query = "SELECT * FROM Players";
        $statement = $this->pdo->query($query);
        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['Name'];
    $poste = $_POST['Poste'];
    $nation = $_POST['Nation'];
    $note = $_POST['Note'];
    $price = $_POST['Price'];
    $club_id = $_POST['Club_ID'];
    $image = $_FILES['Image_URL'];
    $categoryIds = $_POST['Players'] ?? [];

   
    $target_dir = __DIR__ . "../../image/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $image_name = basename($image["name"]);
    $target_file = $target_dir . $image_name;
    $relative_path = "/image/" . $image_name;

    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        $query = "INSERT INTO Players (Name, Poste, Nation, Note, Price, Club_ID, image_URL) 
        VALUES (:Name, :Poste, :Nation, :Note, :Price, :Club_ID, :image_URL)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':Name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':Poste', $poste, PDO::PARAM_STR);
        $stmt->bindParam(':Nation', $nation, PDO::PARAM_INT);
        $stmt->bindParam(':Note', $note, PDO::PARAM_STR);
        $stmt->bindParam(':Price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':Club_ID', $club_id, PDO::PARAM_STR);
        $stmt->bindParam(':image_URL', $relative_path, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $PlayersId = $this->pdo->lastInsertId();
    
            foreach ($PlayersIds as $PlayerId) {
                $query = "INSERT INTO Players (Players_id, Club_id) VALUES (:Players_id, :Club_id)";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':Players_id', $PlayersId, PDO::PARAM_INT);
                $stmt->bindParam(':Club_id', $club_id, PDO::PARAM_INT);
                $stmt->execute();
            }
            header("Location: .php");
            exit;
        } else {
            echo "Erreur d'ajout du Joueur.";
        }
    } else {
        echo "Erreur de téléchargement de l'image.";
    }
    
    }
    
    }


    public function update($Player){


    }

}