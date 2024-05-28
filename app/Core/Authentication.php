<?php

declare(strict_types=1);

namespace App\Core;

class Authentication
{

    public function attempt($email, $password)
    {

        $user = (new Database)->query("SELECT * FROM users Where email =:email", [
            'email' => $email,
        ])->find();

        return $this->validateCredentials($user, $password);
    }

    public function validateCredentials($user, $password)
    {
        if ($user) {
            if (password_verify($password, $user['password']) && $user['account_activation_hash'] == null) {
                $_SESSION['user'] = ["id" => $user['id'], 'name' => $user['name']];
                session_regenerate_id(true);

                return true;
            }
        }
        return false;
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();

        $paramsCookie = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $paramsCookie['path'], $paramsCookie['domain']);
    }
}
