<?php

abstract class Controller {
    protected $model;

    public function __construct()
    {
        $this->model=new $this->model();
    }


    public function findAll($template){
        // un controlleur appelle optionnement un model
        $Players=$this->model->findAll();
        // un controlleur appelle forcement une vue
        include __DIR__."/../Template/".$template.".php";
    }

    public function findBy($id,$template){
        $Players=$this->model->findBy($id);
        include __DIR__."/../Template/".$template.".php";       
    }


    public function delete($Players_id){
        $Players=$this->model->delete($Players_id);
        include __DIR__."/../Template/delete.php";
    
    }



}
