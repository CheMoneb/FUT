<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Liste des Joueurs</h1>
<?php
foreach ($Player as $Players) { ?>
    <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card">
            <img src="<?= htmlspecialchars($Players['Image_URL']); ?>" class="card-img-top img-fluid" alt="Image de <?= htmlspecialchars($Players['Name']); ?>">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($Players['Name']); ?></h5>
                <p class="card-text"><?= htmlspecialchars($Players['Poste']); ?></p>
                <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($Players['Nation']); ?>€</h6>
                <p class="card-text"><?= htmlspecialchars($Players['Note']); ?></p>
                <p class="card-text">Catégories : <?= htmlspecialchars($Players['Price']); ?></p>
                <p class="card-text">Catégories : <?= htmlspecialchars($Players['Club_ID']); ?></p>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');" href="Players$Players/deletecars.php?id=<?= htmlspecialchars($Players['id']); ?>">Supprimer</a>
                    <a class="btn btn-primary" href=".php?id=<?= htmlspecialchars($Players['id']); ?>">Mettre à jour</a>
                </div>
                <a href="?Id=<?= $Players['id']; ?>" class="btn btn-outline-success">Réserver</a>
            </div>
        </div>
    </div>
<?php } ?>
</div>
</div>

</body>
</html>
