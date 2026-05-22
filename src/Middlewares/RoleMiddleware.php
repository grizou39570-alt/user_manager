<?php

namespace App\Middlewares;

class RoleMiddleware
{
  public function handle(int $value): void
  {
    if (!isset($_SESSION['user_id'])) {
      header('Location: /login');
      exit();
    }
    // Il est connecté
    if (((int) $_SESSION['role'] ?? 0) !== $value) {
      http_response_code(403);
      echo 'Erreur 403 - Accès interdit (Droits insuffisants)';
      exit();
    }
  }
}
