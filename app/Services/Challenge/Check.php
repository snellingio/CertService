<?php
declare(strict_types=1);

namespace Service\Challenge;

use AcmePhp\Core\AcmeClient;
use AcmePhp\Core\Challenge\Http\SimpleHttpSolver;
use AcmePhp\Core\Protocol\AuthorizationChallenge;

class Check
{

    public function handle(AcmeClient $acme, AuthorizationChallenge $challenge): bool
    {
        $solver = new SimpleHttpSolver();
        $solver->solve($challenge);

        $check = $acme->challengeAuthorization($challenge);

        return !($check['status'] !== 'valid');
    }
}
