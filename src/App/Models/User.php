<?php

declare(strict_types=1);

namespace App\Models;

class User extends BaseModel
{


    public function create(string $name, string $email): int{
        $stmt = $this->db->prepare('INSERT INTO users (name, email)
                                    VALUES (:name, :email)'
        );
        $stmt->execute([
            'name' => $name,
            'email' => $email
        ]);
        return (int) $this->db->lastInsertId();

    }
}