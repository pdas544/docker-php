<?php

declare(strict_types=1);
namespace App\Models;


use App\App;
use App\Database;

abstract class BaseModel
{
    protected Database $db;
    public function __construct()
    {
        $this->db = App::getDb();
    }
}