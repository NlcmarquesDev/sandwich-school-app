<?php

declare(strict_types=1);

namespace App\Core\Middleware;

class Auth
{

    public function handle()
    {
        if (!$_SESSION['user'] ?? false) {
            redirect('/broodjes_app/');
        }
    }
}
