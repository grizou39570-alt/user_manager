<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function loginView(): void
    {
        $messages = [];
        require_once __DIR__ . '/../Views/login.php';
    }

    public function login(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $messages = [];

        if (strlen($email) === 0 || !str_contains($email, '@')) {
            $messages[] = '<div class="alert alert-danger">Email invalide.</div>';
        }

        if (strlen($password) < 4) {
            $messages[] = '<div class="alert alert-danger">Le mot de passe doit contenir au moins 4 caractères.</div>';
        }

        if (!empty($messages)) {
            require_once __DIR__ . '/../Views/login.php';
            die();
        }

        $user = User::findByEmail($email);

        if ($user === null) {
            $messages[] = '<div class="alert alert-danger">Aucun utilisateur trouvé avec cet email.</div>';
            require_once __DIR__ . '/../Views/login.php';
            die();
        }

        if (!password_verify($password, $user->getPassword())) {
            $messages[] = '<div class="alert alert-danger">Le mot de passe ne correspond pas.</div>';
            require_once __DIR__ . '/../Views/login.php';
            die();
        }

        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $_SESSION['user_id'] = $user->getId();
        // store role in session for permission checks (1 = admin)
        $_SESSION['role'] = $user->getRoleId();
        header('Location: /');
        die();
    }

    public function logout(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        $_SESSION["user_id"] = null;
        $_SESSION["role"] = null;
        header('Location: /login');
        die();
    }

    public function registerView(): void
    {
        $messages = [];
        require_once __DIR__ . '/../Views/register.php';
    }

    public function register(): void
    {
        $messages = [];
        $success = false;
        $nom = trim($_POST['lastname'] ?? '');
        $prenom = trim($_POST['firstname'] ?? '');

        $nomComplet = trim($prenom . ' ' . $nom);

        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($nom === '') {
            $messages[] = '<div class="alert alert-danger">Le nom est requis.</div>';
        }

        if ($prenom === '') {
            $messages[] = '<div class="alert alert-danger">Le prénom est requis.</div>';
        }

        if ($email === '') {
            $messages[] = '<div class="alert alert-danger">L\'email est requis.</div>';
        } elseif (!str_contains($email, '@')) {
            $messages[] = '<div class="alert alert-danger">Email invalide.</div>';
        } elseif (User::findByEmail($email) !== null) {
            $messages[] = '<div class="alert alert-danger">Email déjà pris.</div>';
        }

        if ($password === '') {
            $messages[] = '<div class="alert alert-danger">Le mot de passe est requis.</div>';
        } elseif (strlen($password) < 4) {
            $messages[] = '<div class="alert alert-danger">Le mot de passe doit contenir au moins 4 caractères.</div>';
        }

        if (!empty($messages)) {
            require __DIR__ . '/../Views/register.php';
            return;
        }

        $user = new User();
        $user->setNom($nomComplet);
        $user->setEmail($email);
        $user->setPassword(password_hash($password, PASSWORD_BCRYPT));
        $user->cree();

        $messages[] = '<div class="alert alert-success">Inscription réussie !</div>';
        $success = true;
        require __DIR__ . '/../Views/register.php';
    }
}
