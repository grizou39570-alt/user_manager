<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class User
{
  private $db;
  private $id;
  private $nom;
  private $email;
  private $roleId;
  private $password;

  public function __construct()
  {
    $this->db = Database::getInstance()->getConnection();
  }

  public function getId(): int
  {
    return $this->id;
  }
  public function setId(int $_id): void
  {
    $this->id = $_id;
  }

  public function getNom(): string
  {
    return $this->nom;
  }
  public function setNom(string $_nom): void
  {
    $this->nom = $_nom;
  }

  public function getEmail(): string
  {
    return $this->email;
  }
  public function setEmail(string $_email): void
  {
    $this->email = $_email;
  }

  public function getRoleId(): int
  {
    return $this->roleId;
  }

  public function setPassword(string $_password): void
  {
    $this->password = $_password;
  }

  public function getPassword(): string
  {
    return $this->password;
  }

  public static function update(int $id, string $nom, string $email, int $roleId): bool
  {
    $db = Database::getInstance()->getConnection();
    $query = 'UPDATE users SET nom = :nom, email = :email, roleId = :roleId WHERE id = :id';
    $stmt = $db->prepare($query);
    return $stmt->execute([
      ':nom' => $nom,
      ':email' => $email,
      ':roleId' => $roleId,
      ':id' => $id,
    ]);
  }

  public static function delete(int $id): bool
  {
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
    return $stmt->execute([':id' => $id]);
  }

  public function getAll(): array
  {
    $query = "SELECT users.id, users.nom, users.email, users.roleId as role_id, roles.nom as role_nom
                 FROM users
                 JOIN roles ON users.roleId = roles.id";
    $stmt = $this->db->query($query);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function findById(int $id)
  {
    $db = Database::getInstance()->getConnection();
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetch();

    if ($data) {
      $user = new User();
      $user->id = (int) $data['id'];
      $user->setNom($data['nom']);
      $user->setEmail($data['email']);
      $user->roleId = isset($data['roleId']) ? (int) $data['roleId'] : 0;
      return $user;
    }

    return null;
  }

  public static function findByEmail(string $email)
  {
    $db = Database::getInstance()->getConnection();
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $data = $stmt->fetch();

    if ($data) {
      $user = new User();
      $user->setId((int) $data['id']);
      $user->setNom($data['nom']);
      $user->setEmail($data['email']);
      $user->setPassword($data['mdp']);
      $user->roleId = isset($data['roleId']) ? (int) $data['roleId'] : 0;
      return $user;
    }

    return null;
  }

  public function cree(): bool
  {
    $query = 'INSERT INTO users (nom, email, mdp, roleId) VALUES (:fullname, :email, :mdp, :roleId)';
    $stmt = $this->db->prepare($query);

    $roleId = $this->roleId ?? 2;

    return $stmt->execute([
      ':fullname' => $this->nom,
      ':email' => $this->email,
      ':mdp' => $this->password,
      ':roleId' => $roleId,
    ]);
  }
}
