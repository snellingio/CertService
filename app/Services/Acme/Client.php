<?php
declare(strict_types=1);

namespace Service\Acme;

use AcmePhp\Core\AcmeClient;
use AcmePhp\Core\Http\Base64SafeEncoder;
use AcmePhp\Core\Http\SecureHttpClient;
use AcmePhp\Core\Http\ServerErrorHandler;
use AcmePhp\Ssl\KeyPair;
use AcmePhp\Ssl\Parser\KeyParser;
use AcmePhp\Ssl\PrivateKey;
use AcmePhp\Ssl\PublicKey;
use AcmePhp\Ssl\Signer\DataSigner;
use Container;
use GuzzleHttp;

class Client
{

    public function handle(): AcmeClient
    {
        $directory = Container::get('ACME_DIRECTORY');

        $configuration = (new SetupConfiguration)->handle();

        $secureHttpClient = new SecureHttpClient(
            new KeyPair(new PublicKey($configuration->public), new PrivateKey($configuration->private)),
            new GuzzleHttp\Client(),
            new Base64SafeEncoder(),
            new KeyParser(),
            new DataSigner(),
            new ServerErrorHandler()
        );

        return new AcmeClient($secureHttpClient, $directory);
    }
}


