--TEST--
Verifies that generated access interceptors disallow protected property direct unset
--FILE--
<?php

require_once __DIR__ . '/init.php';

class Kitchen
{
    protected $sweets;
}

$factory = new \ProxyManager\Factory\AccessInterceptorScopeLocalizerFactory($configuration);

$proxy = $factory->createProxy(new Kitchen());

unset($proxy->sweets);
?>
--EXPECTF--
%SFatal error: Cannot access protected property %s::$sweets in %s on line %d
