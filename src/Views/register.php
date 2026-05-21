<?php

/** @var array $messages */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>
    <div class="login-container" id="registerContainer">
        <div class="login-header">
            <h2>Inscription</h2>
        </div>

        <div id="messagesContainer">
            <?php foreach ($messages as $message): ?>
                <?= $message ?>
            <?php endforeach; ?>
        </div>

        <form method="POST" action="/register">
            <div class="mb-3">
                <label for="firstname" class="form-label"><i class="fas fa-user"></i> Prénom</label>
                <input type="text" class="form-control input-custom" id="firstname" name="firstname" placeholder="Entrez votre Prénom">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label"><i class="fas fa-user"></i> Nom</label>
                <input type="text" class="form-control input-custom" id="lastname" name="lastname" placeholder="Entrez votre Nom">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-user"></i> Email</label>
                <input type="text" class="form-control input-custom" id="email" name="email" placeholder="Entrez votre email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock"></i> Mot de passe</label>
                <input type="password" class="form-control input-custom" id="password" name="password" placeholder="Entrez votre mot de passe">
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-custom">S'inscrire</button>
        </form>

        <div class="mt-3 text-center">
            <a href="/login" class="btn btn-secondary">Se connecter</a>
        </div>
    </div>
</body>

</html>

<script>
    function showSuccessModal() {
        alert('Inscription réussie ! Vous allez être redirigé vers la connexion ou vous pourrez vous connecter.');
        window.location.href = '/login';
    }

    <?php if (isset($success) && $success): ?>
        window.addEventListener('load', showSuccessModal);
    <?php endif; ?>
</script>