<?php
declare(strict_types=1);

namespace Service\Challenge;

use AcmePhp\Core\Protocol\AuthorizationChallenge;
use Model\Domain;

class Load
{

    public function handle(Domain $domain): AuthorizationChallenge
    {
        return new AuthorizationChallenge(
            $domain->name,
            $domain->challenge->type,
            $domain->challenge->url,
            $domain->challenge->token,
            $domain->challenge->payload
        );
    }
}
