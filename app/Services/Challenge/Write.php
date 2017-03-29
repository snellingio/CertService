<?php
declare(strict_types=1);

namespace Service\Challenge;

use AcmePhp\Core\Protocol\AuthorizationChallenge;
use Container;

class Write
{

    public function handle(AuthorizationChallenge $authorizationChallenge)
    {
        $filesystem = Container::get('AcmeFilesystem');
        $filesystem->write($authorizationChallenge->getToken(), $authorizationChallenge->getPayload());

        return true;
    }
}
