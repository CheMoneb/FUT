<?php

if (!(isset($_GET['page']))){
   $page="erreur";
}
else {
   $page=$_GET['page'];
}
echo $page;
if ($page==="Players"){
   session_start();
   echo "je suis dans la page Players!";
   include __DIR__."/Controller/ControllerPlayers.php";
   $controlleur=new ControllerPlayers();
   $controlleur->findAll("Players");
   //include __DIR__."/Template/TemplatePlayers.php";

}

if ($page==="delete"){
   include __DIR__."/Controller/DeleteController.php";
   $controlleur=new DeleteController();
   $id = "ID";
   $controlleur->delete($id);
if ($page==="Club"){
   echo "je suis dans la page Club";
   include __DIR__."/Controller/ControllerClub.php";
   $controlleur=new ControllerClub();
   $controlleur->findAll("Club");
   //include __DIR__."/Template/TemplatePlayers.php";

}

if ($page==="Transfert"){
   echo "je suis dans la page Transfert";
   include __DIR__."/Controller/ControllerTransfert.php";
   $controlleur=new ControllerTransfert();
   $controlleur->findAll("Transfert");
   //include __DIR__."/Template/TemplatePlayers.php";

}

//if ($page==="Player"){
   //echo "je suis dans la page Players!";
   //include __DIR__."/Controller/ControllerPlayers.php";
   //$controlleur=new ControllerPlayers();
   //$controlleur->findBy("Players");
   //include __DIR__."/Template/books.php";
//}
