<?php

abstract class Model
{
    protected PDO $pdo;


    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=FUT', 'root', '');
    }
}
