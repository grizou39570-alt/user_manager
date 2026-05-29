<?php

/** @var array $messages */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/register.css">
    <title>Inscription</title>
</head>

<body>
    <div class="login__container">
        <div class="login__header">
            <h2>Inscription</h2>
        </div>

        <div id="messagesContainer">
            <?php foreach ($messages as $message): ?>
                <?= $message ?>
            <?php endforeach; ?>
        </div>

        <div class="login__content">
            <form class="form" method="POST" action="/register">
                <div class="login__input">
                    <input type="text" id="firstname" name="firstname" placeholder="Prénom">
                    <input type="text" id="lastname" name="lastname" placeholder="Nom">
                    <input type="email" id="email" name="email" placeholder="Email">
                    <input type="password" id="password" name="password" placeholder="Mot de passe">
                </div>
                <p class="login__choice">Ou continuer avec :</p>
                <div class="login__method">

                    <a>
                    </a>
                    <a><svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="48" height="48" fill="url(#pattern0_602_525)" />
                            <defs>
                                <pattern id="pattern0_602_525" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_602_525" transform="translate(-14.0417 -13.9792) scale(0.0208333)" />
                                </pattern>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="login__button">
                    <button type="submit">S'inscrire</button>
                    <a href="/login">Se connecter</a>
                </div>
            </form>
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