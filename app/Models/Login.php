<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Login extends User
{

    public  function confirmToken($token)
    {
        return (new Database)->query('SELECT  * FROM users WHERE account_activation_hash = :account_activation_hash', [
            'account_activation_hash' => $token
        ])->find();
    }

    public  function tokenUpdateToNull($tokenId)
    {
        $this->db->query('UPDATE users SET account_activation_hash = null WHERE id=:id', [
            ':id' => $tokenId
        ]);
    }
}
