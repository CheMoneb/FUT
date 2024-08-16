<?php

abstract class Model {
    protected PDO $pdo;
    
        

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=FUT', 'root', '');
    }
    
    public function findAll(){
        $query = "SELECT * FROM Players AS p
        INNER JOIN club AS c
        ON p.Club_ID = c.ID ";
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

    public function delete($Players_id){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Players_id = $_POST['Players_id']; 

            $delete = "DELETE FROM Players WHERE ID = :Players_id";
            $stmt = $this->pdo->prepare($delete);
            $stmt->bindParam(':Players_ID', $Players_id, PDO::PARAM_INT);
        
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
 
    public function create($Players){

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
    
            foreach ($Players as $Player) {
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['ID'];
            $name = $_POST['Name'];
            $poste = $_POST['Poste'];
            $nation = $_POST['Nation'];
            $note = $_POST['Note'];
            $price = $_POST['Price'];
            $club_id = $_POST['Club_ID'];
            $image = $_FILES['Image_URL'];
            $categoryIds = $_POST['Players'] ?? [];
        
            // Vérifier que les champs obligatoires sont présents
            if (!$id || !$name || !$poste || !$nation || !$note || $price || !$club_id || !$image) {
                header("Location: success_updatecar.php?status=error");
                exit;
            }
        
            // Requête pour mettre à jour la série
            $query = "UPDATE Players SET Name = :Name, Poste = :Poste, Nation = :Nation, Note = :Note, Price = :Price, Image_URL = :Image_URL WHERE ID = :ID";
            $stm = $this->pdo->prepare($query);
            $stm->bindParam(':Name', $name, PDO::PARAM_STR);
            $stm->bindParam(':Poste', $poste, PDO::PARAM_STR);
            $stm->bindParam(':Nation', $nation, PDO::PARAM_INT);
            $stm->bindParam(':Note', $note, PDO::PARAM_STR);
            $stm->bindParam(':Price', $price, PDO::PARAM_STR);
            $stm->bindParam(':Club_ID', $club_id, PDO::PARAM_STR);
            $stm->bindParam(':image_URL', $image, PDO::PARAM_STR);
        
            // Exécuter la requête SQL
            if ($stm->execute()) {
                // Mise à jour des catégories
                $query = "DELETE FROM Players WHERE Players_ID = :ID";
                $stm = $this->pdo->prepare($query);
                $stm->bindValue(":ID", $id, PDO::PARAM_INT);
                $stm->execute();
        
                foreach ($categories as $category_id) {
                    $query = "INSERT INTO Players (Players_id, Club_id) VALUES (:Players_id, :Club_id)";
                    $stm = $this->pdo->prepare($query);
                    $stm->bindValue(":PLayers_id", $id, PDO::PARAM_INT);
                    $stm->bindValue(":Club_id", $category_id, PDO::PARAM_INT);
                    $stm->execute();
                }
        
                // Gérer l'upload de l'image
                if ($_FILES['Image_URL']['name']) {
                    $target_dir = __DIR__ . "../../image/";
                    $image_name = basename($_FILES['Image_URL']['name']);
                    $target_file = $target_dir . $image_name;
                    $relative_path = "/image/" . $image_name;
        
                    if (move_uploaded_file($_FILES['Image_URL']['tmp_name'], $target_file)) {
                        $query = "UPDATE Players SET Image_URL = :Image_URL WHERE ID = :ID";
                        $stm = $this->pdo->prepare($query);
                        $stm->bindValue(":Image_URL", $relative_path, PDO::PARAM_STR);
                        $stm->bindValue(":ID", $id, PDO::PARAM_INT);
                        $stm->execute();
                    } else {
                        header("Location: .php?status=error");
                        exit;
                    }
                }
        
                // Rediriger vers la page de confirmation avec succès
                header("Location: .php?status=success");
                exit;
            } else {
                // Rediriger vers la page de confirmation avec erreur
                header("Location: .php?status=error");
                exit;
            }
        } else {
            echo "Requête invalide.";
        }

    }

}