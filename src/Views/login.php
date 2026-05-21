<?php

/** @var array $messages */
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>LOGIN</title>
</head>

<body>

    <div class="login-container">
        <div class="login-header">
            <h2>Connexion</h2>
        </div>

        <?php foreach ($messages as $message): ?>
            <?= $message ?>
        <?php endforeach; ?>

        <form method="POST" action="/login">
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-user"></i> Email</label>
                <input type="text" class="form-control input-custom" id="email" name="email" placeholder="Entrez votre email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock"></i> Mot de passe</label>
                <input type="password" class="form-control input-custom" id="password" name="password" placeholder="Entrez votre mot de passe">
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-custom">Se connecter</button>
        </form>

        <div class="mt-3 text-center">
            <a href="/register" class="btn btn-secondary">S'incrire</a>
        </div>
    </div>

</body>

</html>