<?php
declare(strict_types=1);

namespace Service\Acme;

class Register
{

    public function handle(string $email): bool
    {
        $acme = (new Client)->handle();
        $acme->registerAccount(null, $email);

        return true;
    }
}
