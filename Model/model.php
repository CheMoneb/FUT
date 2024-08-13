<?php

abstract class Model {
    protected PDO $pdo;
    protected $table;


    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=FUT', 'root', '');
    }
    
    public function findAll(){
        $query = "SELECT * FROM $this->table";
        $statement = $this->pdo->query($query);

        // 3. statement qui formate les données sous forme de tableau
        $Player = $statement->fetchAll(PDO::FETCH_ASSOC); 
        // PDO::FETCH_ASSOC correspond au formatage de donnée approprié
        return $Player;

    }

    public function findBy($id){

        $query = "SELECT * FROM $this->table where id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        // 3. statement qui formate les données sous forme de tableau
        $Player = $statement->fetch(PDO::FETCH_ASSOC); 
        // PDO::FETCH_ASSOC correspond au formatage de donnée approprié
        return $Player;

    }

    public function delete($id){


    }

    public function create($book){


    }

    public function update($book){


    }






}