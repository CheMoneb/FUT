<?php

if (!(isset($_GET['page']))){
   $page="erreur";
}
else {
   $page=$_GET['page'];
}
echo $page;
if ($page==="Players"){
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
   //include __DIR__."/Template/TemplatePlayers.php";

}

//if ($page==="Player"){
   //echo "je suis dans la page Players!";
   //include __DIR__."/Controller/ControllerPlayers.php";
   //$controlleur=new ControllerPlayers();
   //$controlleur->findBy("Players");
   //include __DIR__."/Template/books.php";
//}
