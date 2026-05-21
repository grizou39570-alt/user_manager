<?php

/**  @var object $user */
/**  @var array $roles */
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/style.css">
  <title>Modifier</title>
</head>

<body class="edit-page">
  <main class="edit-page__container">
    <h1 class="edit-page__title">Modifier l'utilisateur</h1>
    <p class="edit-page__subtitle">ID: <?php echo htmlspecialchars($paramsId ?? ''); ?></p>

    <form class="edit-page__form" method="post" action="">
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($paramsId ?? ''); ?>">

      <div class="edit-page__field">
        <label for="nom" class="edit-page__label">Nom</label>
        <input class="edit-page__control" type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user->getNom()); ?>">
      </div>

      <div class="edit-page__field">
        <label for="Email" class="edit-page__label">Email</label>
        <input class="edit-page__control" type="email" id="Email" name="email" value="<?php echo htmlspecialchars($user->getEmail()); ?>">
      </div>

      <div class="edit-page__field">
        <label for="Role" class="edit-page__label">Rôle</label>
        <select class="edit-page__control" name="Role" id="Role">
          <?php foreach ($roles as $role): ?>
            <?php $roleId = isset($role['id']) ? $role['id'] : ($role->getId() ?? 0); ?>
            <?php $roleName = isset($role['nom']) ? $role['nom'] : ($role->getName() ?? ''); ?>
            <option value="<?php echo htmlspecialchars($roleId); ?>" <?php echo ($user->getRoleId() == $roleId) ? 'selected' : ''; ?>><?php echo htmlspecialchars($roleName); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="edit-page__actions">
        <button class="edit-page__button edit-page__button--submit" type="submit">Valider</button>
        <a class="edit-page__button edit-page__button--cancel" href="/">Annuler</a>
      </div>
    </form>
  </main>
</body>

</html>