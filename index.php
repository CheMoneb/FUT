<?php

if (!(isset($_GET['page']))){
   $page="erreur";
}
else {
   $page=$_GET['page'];
}
echo $page;
if ($page==="Players"){
   include __DIR__."/Controller/ControllerPlayers.php";
   include __DIR__."/Controller/ControllerClub.php";
   $controlleur=new ControllerClub();
   $controlleur->findAll("Club");
   $controlleur=new ControllerPlayers();
   $controlleur->findAll("Players");
   //include __DIR__."/Template/TemplatePlayers.php";

}

if ($page==="delete"){
   include __DIR__."/Controller/DeleteController.php";
   $controlleur=new DeleteController();
   $id = "ID";
   $controlleur->delete($id);
}

if ($page==="Club"){
   include __DIR__."/Controller/ControllerClub.php";
   $controlleur=new ControllerClub();
   $controlleur->findAll("Club");
   //include __DIR__."/Template/TemplatePlayers.php";

}


//if ($page==="Player"){
   //echo "je suis dans la page Players!";
   //include __DIR__."/Controller/ControllerPlayers.php";
   //$controlleur=new ControllerPlayers();
   //$controlleur->findBy("Players");
   //include __DIR__."/Template/books.php";
//}

if ($page==="Free"){
   session_start();
   echo "je suis dans la page Free!";
   include __DIR__."/Controller/ControllerFree.php";
   include __DIR__."/Controller/ControllerPlayers.php";
   $controlleur=new ControllerFree();
   $controlleur->findAll("Free");
   //include __DIR__."/Template/books.php";
}