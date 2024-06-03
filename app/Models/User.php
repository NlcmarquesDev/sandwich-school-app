<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class User
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAll()
    {

        return $this->db->query('SELECT * FROM users')->findAll();
    }
    public function getById($id)
    {
        return $this->db->query('SELECT * FROM users WHERE id=:id', [':id' => $id])->find();
    }

    public function getUserByEmail($email)
    {
        return $this->db->query('SELECT email FROM users WHERE email = :email', [
            'email' => $email,
        ])->find();
    }

    public function createUser($name, $email, $password, $newPass, $activationToken)
    {
        $this->db->query('INSERT INTO users (name,email, password, temp_pass, account_activation_hash) VALUES(:name, :email, :password, :temp_pass,:account_activation_hash)', [
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'password' => $password,
            'temp_pass' => $newPass,
            'account_activation_hash' => $activationToken
        ]);
    }

    public function getResetTokenHash($token)
    {
        return $this->db->query('SELECT  * FROM users WHERE reset_token_hash = :reset_token_hash', [
            'reset_token_hash' => $token
        ])->find();
    }
    public function updateResetTokenHash($token)
    {
        return $this->db->query('UPDATE users SET reset_token_hash = null, reset_token_expire_at =null  WHERE id=:id', [
            ':id' => $token
        ]);
    }
    public function updateUserForForgetPassword($email, $pass, $newPass, $resetToken, $expiry, $activationToken)
    {
        $this->db->query('UPDATE users SET password = :password, temp_pass =:temp_pass, reset_token_hash=:reset_token_hash, reset_token_expire_at= :reset_token_expire_at  , account_activation_hash = :account_activation_hash WHERE email=:email', [
            'email' => htmlspecialchars($email),
            'password' => $pass,
            'temp_pass' => $newPass,
            'reset_token_hash' => $resetToken,
            'reset_token_expire_at' => $expiry,
            'account_activation_hash' => $activationToken
        ]);
    }
}
