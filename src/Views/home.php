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
    <form method="POST" action="/logout" style="width: 100%;">
      <button type="submit" class="logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
          <path d="m16 17 5-5-5-5" />
          <path d="M21 12H9" />
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
        </svg></button>
    </form>
  </aside>
  <main class="dashboard__content">
    <div class="container">
      <div class="affiche">
        <p> 1-9 sur 100 resultat</p>
      </div>
      <div class="searchbar">
        <div class="search__content">
          <div class="searchbar__bar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search">
              <path d="m21 21-4.34-4.34" />
              <circle cx="11" cy="11" r="8" />
            </svg>

            <input name="searchbar__bar" class="" type="text" placehorlder="Rechercher...">
          </div>


          <div class="content__button">
            <div class="content__buttonStyle">
              <a class="button--list">
                <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.5 0.5H18.5V2.5H4.5V0.5ZM4.5 8.5V6.5H18.5V8.5H4.5ZM1.5 0C1.89782 0 2.27936 0.158035 2.56066 0.43934C2.84196 0.720644 3 1.10218 3 1.5C3 1.89782 2.84196 2.27936 2.56066 2.56066C2.27936 2.84196 1.89782 3 1.5 3C1.10218 3 0.720644 2.84196 0.43934 2.56066C0.158035 2.27936 0 1.89782 0 1.5C0 1.10218 0.158035 0.720644 0.43934 0.43934C0.720644 0.158035 1.10218 0 1.5 0ZM1.5 6C1.89782 6 2.27936 6.15804 2.56066 6.43934C2.84196 6.72064 3 7.10218 3 7.5C3 7.89782 2.84196 8.27936 2.56066 8.56066C2.27936 8.84196 1.89782 9 1.5 9C1.10218 9 0.720644 8.84196 0.43934 8.56066C0.158035 8.27936 0 7.89782 0 7.5C0 7.10218 0.158035 6.72064 0.43934 6.43934C0.720644 6.15804 1.10218 6 1.5 6ZM4.5 14.5V12.5H18.5V14.5H4.5ZM1.5 12C1.89782 12 2.27936 12.158 2.56066 12.4393C2.84196 12.7206 3 13.1022 3 13.5C3 13.8978 2.84196 14.2794 2.56066 14.5607C2.27936 14.842 1.89782 15 1.5 15C1.10218 15 0.720644 14.842 0.43934 14.5607C0.158035 14.2794 0 13.8978 0 13.5C0 13.1022 0.158035 12.7206 0.43934 12.4393C0.720644 12.158 1.10218 12 1.5 12Z" fill="black" />
                </svg>

              </a>
              <a class="button--square active">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.5" d="M0 8H8V0H0V8ZM0 18H8V10H0V18ZM10 18H18V10H10V18ZM10 0V8H18V0" fill="black" />
                </svg>

              </a>
            </div>

            <a class="button--filter">
              <svg width="32" height="23" viewBox="0 0 32 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 13H22V11H10V13ZM7 6V8H25V6H7ZM14 18H18V16H14V18Z" fill="black" />
              </svg>
              Filtres
            </a>
          </div>
        </div>

      </div>
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
      <div class="pagination">
        <a>1</a>
        <a>2</a>
        <a>3</a>
        <a>4</a>
        <a>+</a>
      </div>
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