<?php
declare(strict_types=1);

namespace Service\Challenge;

use AcmePhp\Core\AcmeClient;
use AcmePhp\Core\Protocol\AuthorizationChallenge;
use Exception;
use Model\Domain;

class Authorize
{

    public function handle(AcmeClient $acme, Domain $domain): AuthorizationChallenge
    {
        $authorizationChallenges = $acme->requestAuthorization($domain->name);

        foreach ($authorizationChallenges as $authorizationChallenge) {
            /* @var $authorizationChallenge AuthorizationChallenge */
            if ('http-01' === $authorizationChallenge->getType()) {
                break;
            }
        }

        /* @var $authorizationChallenge AuthorizationChallenge */
        if ($authorizationChallenge === null) {
            /** @noinspection ThrowRawExceptionInspection */
            throw new Exception('Uh oh');
        }

        (new Save)->handle($authorizationChallenge, $domain);
        (new Write)->handle($authorizationChallenge);

        return $authorizationChallenge;
    }
}
