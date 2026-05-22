<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Role
{
    private $db;
    private $id;
    private $nom;

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
}
