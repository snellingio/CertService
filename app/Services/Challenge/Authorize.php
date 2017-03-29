<?php
declare(strict_types=1);

namespace Service\Challenge;

use AcmePhp\Core\AcmeClient;
use AcmePhp\Core\Protocol\AuthorizationChallenge;
use Model\Domain;

class Authorize
{

    public function handle(AcmeClient $acme, Domain $domain): AuthorizationChallenge
    {
        $authorizationChallenges = $acme->requestAuthorization($domain->name);

        foreach ($authorizationChallenges as $authorizationChallenge) {
            if ('http-01' === $authorizationChallenge->getType()) {
                break;
            }
        }

        /* @var $authorizationChallenge AuthorizationChallenge */
        if ($authorizationChallenge === null) {
            throw new \Exception('Uh oh');
        }

        (new Save)->handle($authorizationChallenge, $domain);
        (new Write)->handle($authorizationChallenge);

        return $authorizationChallenge;
    }
}
