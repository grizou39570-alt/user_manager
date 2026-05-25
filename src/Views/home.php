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

  <aside class="dashboard__sidebar">

    <div class="dashboard__sidebar-profile">
      <div class="profile-img">J</div>

      <div class="profile-info">

        <div class="profile-content">
          <h3 class="profile-name">Anna George</h3>

          <p>Opération Client</p>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down-icon lucide-chevron-down">
          <path d="m6 9 6 6 6-6" />
        </svg>

      </div>

    </div>


    <ul class="sidebar__liste">
      <li class="sidebar__listeItem active">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round-icon lucide-users-round">
          <path d="M18 21a8 8 0 0 0-16 0" />
          <circle cx="10" cy="8" r="5" />
          <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
        </svg>

        <div class="sidebar__listeItem-info">
          <p>Utilisateurs</p>

          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down-icon lucide-chevron-down">
            <path d="m6 9 6 6 6-6" />
          </svg>
        </div>

      </li>

      <li class="sidebar__listeItem">
        <div class="sidebar__listeItem-info">
          <p>Facture</p>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </div>
      </li>
      <li class="sidebar__listeItem">
        <div class="sidebar__listeItem-info">
          <p>Facture</p>

          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </div>
      </li>
    </ul>

    <div class="sidebar__footer">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings-icon lucide-settings">
        <path d="M9.671 4.136a2.34 2.34 0 0 1 4.659 0 2.34 2.34 0 0 0 3.319 1.915 2.34 2.34 0 0 1 2.33 4.033 2.34 2.34 0 0 0 0 3.831 2.34 2.34 0 0 1-2.33 4.033 2.34 2.34 0 0 0-3.319 1.915 2.34 2.34 0 0 1-4.659 0 2.34 2.34 0 0 0-3.32-1.915 2.34 2.34 0 0 1-2.33-4.033 2.34 2.34 0 0 0 0-3.831A2.34 2.34 0 0 1 6.35 6.051a2.34 2.34 0 0 0 3.319-1.915" />
        <circle cx="12" cy="12" r="3" />
      </svg>
      <p>Paramètres</p>
    </div>
  </aside>
  <main class="dashboard__content">
    <div class="container">
      <table class="user-table">
        <thead class="user-table__head">
          <tr class="user-table__row user-table__row--header">
            <th class="user-table__cell user-table__cell--headingID">ID</th>
            <th class="user-table__cell user-table__cell--headingNom">Nom</th>
            <th class="user-table__cell user-table__cell--headingEmail">Email</th>
            <th class="user-table__cell user-table__cell--headingRole">Rôle</th>
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
              <?php if (isset($_SESSION['role']) && (int)$_SESSION['role'] === 1): ?>
                <td class="user-table__cell user-table__cell--actions">
                  <a href="/edit?id=<?= $user['id'] ?>" class="button button--edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen-icon lucide-pen">
                      <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                    </svg>
                  </a>
                  <a href="/delete?id=<?= $user['id'] ?>" class="button button--delete delete-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash">
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                      <path d="M3 6h18" />
                      <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    </svg>
                  </a>
                </td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
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