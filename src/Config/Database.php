<?php

namespace App\Config;

use PDO;
use PDOException;
use Exception;

class Database
{
  private static ?Database $instance = null;
  private PDO $connection;


  private function __construct()
  {
    $driver = $_ENV['DATABASE_DRIVER'];
    $host = $_ENV['DATABASE_HOST'];
    $db   = $_ENV['DATABASE_NAME'];
    $user = $_ENV['DATABASE_USER'];
    $pass = $_ENV['DATABASE_PASSWORD'];
    $charset = 'utf8mb4';

    $dsn = "$driver:host=$host;dbname=$db;charset=$charset";

    $options =
      [
        PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES    => false,
      ];

    try {
      $this->connection = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
      die("Erreur de connexion : " . $e->getMessage());
    }
  }

  protected function __clone() {}

  public function _wakeup()
  {
    throw new Exception("Un Singleton ne peut pas être désérialisé.");
  }


  public static function getInstance(): Database
  {
    if (self::$instance === null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  public function getConnection(): PDO
  {
    return $this->connection;
  }
}
