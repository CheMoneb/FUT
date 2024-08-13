<h1>Liste des catégories</h1>

<?php
// ma variable $books qui contient les livres elle est issue du model
// qui va recuperer les données de la B.D
foreach ($array as $category){
    ?>
    <hr>
    Livre : <a href="book.php?id=<?=$category['id']?>">
        <?=$category['name']?>
    </a> -
    <a href="supprimer.php?id=<?=$category['id']?>">
        supprimer
    </a>
    <?php
}
