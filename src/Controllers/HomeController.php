<?php

namespace App\Controllers;

use App\Models\User;
use App\Config\Database;
use PDO;

class HomeController
{
  public function index(): void
  {
    $userModel = new User();
    $users = $userModel->getAll();

    require_once __DIR__ . '/../Views/home.php';
  }

  public function edit(): void
  {
    $paramsId = $_GET['id'] ?? $_POST['id'] ?? null;
    if ($paramsId === null || trim($paramsId) === '') {
      echo "Id manquant";
      die();
    }

    if (!is_numeric($paramsId)) {
      echo "Id doit être un nombre";
      die();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nom = trim($_POST['nom'] ?? '');
      $email = trim($_POST['email'] ?? '');
      $roleId = (int) ($_POST['Role'] ?? 0);

      if ($nom !== '' && $email !== '' && $roleId > 0) {
        User::update((int) $paramsId, $nom, $email, $roleId);
        header('Location: /');
        exit;
      }
    }

    if ($user = User::findById((int) $paramsId)) {
      // fetch roles from database (simple associative array)
      $db = Database::getInstance()->getConnection();
      $stmt = $db->query('SELECT id, nom FROM roles');
      $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

      require_once __DIR__ . '/../Views/edit.php';
    } else {
      echo "Utilisateur non trouvé";
      die();
    }
  }

  public function login(): void
  {
    $userModel = new User();
    $users = $userModel->getAll();
    require_once __DIR__ . '/../Views/login.php';
  }

  public function delete(): void
  {
    $paramsId = $_GET['id'] ?? null;
    if ($paramsId === null || trim($paramsId) === '') {
      echo "Id manquant";
      die();
    }

    if (!is_numeric($paramsId)) {
      echo "Id doit être un nombre";
      die();
    }

    User::delete((int) $paramsId);
    header('Location: /');
    exit;
  }

  public function register(): void
  {
    $userModel = new User();
    $users = $userModel->getAll();
    require_once __DIR__ . '/../Views/register.php';
  }
}
