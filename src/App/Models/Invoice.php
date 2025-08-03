<?php
declare(strict_types=1);

namespace App\Models;

class Invoice extends BaseModel
{


    public function create(int $userid, float $amount): int{
        $stmt = $this->db->prepare('INSERT INTO invoices (user_id,amount)
                                    VALUES (:user_id, :amount)'
        );
        $stmt->execute([
            'amount' => $amount,
            'user_id' => $userid
        ]);
        return (int) $this->db->lastInsertId();

    }

    public function getInvoiceByUserId(int $userid): array{
        $stmt = $this->db->prepare('SELECT * FROM invoices WHERE user_id = :user_id');
        $stmt->execute([
            'user_id' => $userid
        ]);
        return $stmt->fetchAll();
    }

    public function getInvoiceAndUserData(int $userid): array{
        $stmt = $this->db->prepare('SELECT i.amount, i.id, u.name FROM invoices i JOIN users u ON i.user_id = u.id WHERE u.id = :user_id');
        $stmt->execute([
            'user_id' => $userid
        ]);

        return $stmt->fetchAll();
    }

    public function find(int $invoiceId): array
    {
        $stmt = $this->db->prepare('SELECT i.amount, i.id, u.name FROM invoices i LEFT JOIN users u ON u.id = i.user_id WHERE i.id = :invoice_id');
        $stmt->bindParam(':invoice_id', $invoiceId);
        $stmt->execute();
        return $stmt->fetch();
    }
}