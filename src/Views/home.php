<?php

/**  @var array $users */
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/style.css">
  <title>Dashboard - Gestion des utilisateur</title>
</head>

<body class="dashboard">
  <div class="container">
    <a class="button sidebar__button">List 1</a>
    <a class="button sidebar__button">List 2</a>
    <a class="button 
    sidebar__button">List 3</a>
    <a class="button sidebar__button">List 4</a>
    <a class="button sidebar__button">List 5</a>

    <?php if (isset($_SESSION["user_id"])) : ?>
      <form method="POST" action="/logout">
        <button class="button sidebar__button">Logout</button>
      </form>
    <?php else : ?>
      <a href="/login" class="button sidebar__button">login</a>
    <?php endif; ?>

  </div>
  <div class="tinycontainer">
  </div>
  <div class="searchbar">
    <label for="site-search">Rechercher sur le site:</label>
    <input type="search" id="site-search" name="q" />
  </div>
  <button>Rechercher</button>
  <div class="header">
    <div class="side-nav">
      <div class="user">
        <div>
          <h2><?php if (isset($_SESSION["user_id"])) echo $_SESSION["user_id"] ?></h2>
        </div>
      </div>
    </div>
  </div>

  <header class="dashboard_header">
    <h1 class="dashboard__title dashboard__title--main">Liste des Utilisateurs</h1>
  </header>
  <main class="dashboard__content">
    <table class="user-table">
      <thead class="user-table__head">
        <tr class="user-table__row user-table__row--header">
          <th class="user-table__cell user-table__cell--heading">ID</th>
          <th class="user-table__cell user-table__cell--heading">Nom</th>
          <th class="user-table__cell user-table__cell--heading">Email</th>
          <th class="user-table__cell user-table__cell--heading">Rôle</th>
          <?php if (isset($_SESSION['role']) && (int)$_SESSION['role'] === 1): ?>
            <th class="user-table__cell user-table__cell--heading">Actions</th>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody class="user-table__body">
        <?php if (!isset($_SESSION["user_id"])): ?>
          <tr>
            <td colspan='5' class='user-table__cell'>Veuillez vous connecter pour voir les utilisateurs.</td>
          </tr>
          <?php die(); ?>
        <?php endif; ?>

        <?php foreach ($users as $user): ?>
          <tr class="user-table__row">
            <td class="user-table__cell"><?= htmlspecialchars($user['id']) ?></td>
            <td class="user-table__cell"><?= htmlspecialchars($user['nom']) ?></td>
            <td class="user-table__cell"><?= htmlspecialchars($user['email']) ?></td>
            <td class="user-table__cell">
              <span class="role-badge role-badge--<?= strtolower(htmlspecialchars($user['role_nom'])) ?>">
                <?= htmlspecialchars($user['role_nom']) ?>
              </span>
            </td>
            <td class="user-table__cell user-table__cell--actions">
              <?php if (isset($_SESSION['role']) && (int)$_SESSION['role'] === 1): ?>
                <a href="/edit?id=<?= $user['id'] ?>" class="button button--edit">Modifier</a>
                <a href="/delete?id=<?= $user['id'] ?>" class="button button--delete delete-button">Supprimer</a>
                <span class="admin-badge">Admin</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
</body>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-button').forEach(function(button) {
      button.addEventListener('click', function(event) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
          event.preventDefault();
        }
      });
    });
  });
</script>

</html>