<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class Dumb
{
    /**
     * @var float
     */
    private $foo;

    public function __construct(float $foo)
    {
        $this->foo = $foo;
    }
}


$payload = '{"foo": true}'; // we actually expect a float there

$serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
$dumb = $serializer->deserialize($payload, Dumb::class, 'json');
// no exception thrown :o

var_dump($dumb);

/*
object(Dumb)#13 (1) {
  ["foo":"Dumb":private]=>
  float(1)
}
*/
