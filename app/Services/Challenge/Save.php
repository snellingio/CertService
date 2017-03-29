<?php
declare(strict_types=1);

namespace Service\Challenge;

use AcmePhp\Core\Protocol\AuthorizationChallenge;
use Model\Challenge;
use Model\Domain;
use Ramsey\Uuid\Uuid;

class Save
{

    public function handle(AuthorizationChallenge $authorizationChallenge, Domain $domain): Challenge
    {
        $challenge            = new Challenge;
        $challenge->uuid      = Uuid::uuid4();
        $challenge->domain_id = $domain->id;
        $challenge->url       = $authorizationChallenge->getUrl();
        $challenge->type      = $authorizationChallenge->getType();
        $challenge->token     = $authorizationChallenge->getToken();
        $challenge->payload   = $authorizationChallenge->getPayload();
        $challenge->save();

        return $challenge;
    }
}
