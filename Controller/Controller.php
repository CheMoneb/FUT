<?php

abstract class Controller {
    protected $model;

    public function __construct()
    {
        $this->model=new $this->model();
    }


    public function findAll($template){
        // un controlleur appelle optionnement un model
        $FUT=$this->model->findAll();
        // un controlleur appelle forcement une vue
        include __DIR__."/../Template/".$template.".php";
    }

    public function findBy($id,$template){
        $FUT=$this->model->findBy($id);
        include __DIR__."/../Template/".$template.".php";       
    }

}