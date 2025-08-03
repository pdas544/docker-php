<?php

declare(strict_types=1);

namespace App\Models;

class SignUp extends BaseModel
{

    /**
     * @param User $userModel
     * @param Invoice $invoiceModel
     */
    public function __construct(protected User $userModel, protected Invoice $invoiceModel)
    {
        parent::__construct();
    }

    public function register(array $userInfo, array $invoiceInfo): int
    {
        try {
            $this->db->beginTransaction();
            $userId = $this->userModel->create($userInfo['name'], $userInfo['email']);

            $invoiceId = $this->invoiceModel->create($userId, $invoiceInfo['amount']);

            $this->db->commit();
        } catch (PDOException $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
            throw $e;
        }
        return $invoiceId;
    }
}