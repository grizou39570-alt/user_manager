<?php

/** @var array $messages */
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>LOGIN</title>
</head>

<body class="">

    <button id="modBtn">Change mod</button>

    <div class="login__container">
        <div class="login__header">
            <h2>Connexion</h2>
        </div>

        <?php foreach ($messages as $message): ?>
            <?= $message ?>
        <?php endforeach; ?>
        <div class="login__content">
            <form class="form" method="POST" action="/login">
                <div class="login__input">

                    <input type="email" class="login__email--input" id="email" name="email" placeholder="Entrez votre email">

                    <input type="password" class="login__password--input" id="password" name="password" placeholder="Entrez votre mot de passe">
                </div>
                <p class="login__choice">Ou continuer avec :</p>
                <div class="login__method">

                    <a>
                        <img src="/assets/imgs/google.svg" style="width: 40px; height: 40px;" />
                    </a>

                    <a>
                        <img src="/assets/imgs/meta-svgrepo-com.svg" style=" width=" 40px" height="40px" ;

                            </a>
                        <a>
                            <img src="/assets/imgs/apple-logo-svgrepo-com.svg" style=" width=" 40px" height="40px" ;
                                </a>
                </div>
        </div>
        <div class=" login__button">
            <button type="submit" name="login">Se connecter</button>
            <a class="login__buttonRegister" href="/register">S'incrire</a>

        </div>
        </form>
    </div>

    </div>


    <script>
        const modBtn = document.getElementById("modBtn");
        modBtn.addEventListener('click', onClick);

        function onClick() {
            const body = document.querySelector("body");
            if (body.className === "") {
                body.className = "dark";
            } else {
                body.className = "";
            }
        }
    </script>
</body>

</html>