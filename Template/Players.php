<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="text-center my-4">Liste des Joueurs</h1>
    <div class="container">
        <div class="row">
        <?php foreach ($Players as $Player) { ?>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="<?= htmlspecialchars($Player['Image_URL']); ?>" class="card-img-top img-fluid" alt="Image de <?= htmlspecialchars($Player['Name']); ?>">
                    <div class="card-body">
                        <h3 class="card-title"><?= htmlspecialchars($Player['Name']); ?></h3>
                        <p class="card-text"><?= htmlspecialchars($Player['Poste']); ?></p>
                        <p class="card-text">Nationalité : <?= htmlspecialchars($Player['Nation']); ?></p>
                        <p class="card-text">Prix : <?= htmlspecialchars($Player['Price']); ?>€</p>
                        <p class="card-text">Club_ID : <?= htmlspecialchars($Player['Club_ID']); ?></p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?');" href="Player$Player/deletecars.php?id=<?= htmlspecialchars($Player['ID']); ?>">Supprimer</a>
                            <a class="btn btn-primary" href=".php?id=<?= htmlspecialchars($Player['ID']); ?>">Mettre à jour</a>
                        </div>
                        <a href="?Id=<?= $Player['ID']; ?>" class="btn btn-outline-success mt-2">Réserver</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>