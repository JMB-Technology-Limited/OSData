<?php

require  __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'src-bin'.DIRECTORY_SEPARATOR.'bootstrap.php';


/**
 *
 * @link https://github.com/JMB-Technology-Limited/OSData
 * @license https://raw.github.com/JMB-Technology-Limited/OSData/master/LICENSE.md 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */

$dir = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'codepointopen'.DIRECTORY_SEPARATOR;

$dataAdaptor = new \JMBTechnologyLimited\OSData\CodePointOpen\FileDataAdaptor($dir);

$service = new \JMBTechnologyLimited\OSData\CodePointOpen\CodePointOpenService($dataAdaptor);

$postCode = $service->getPostcode($argv[1]);

if ($postCode) {
    print "Lat,Lng: ". $postCode->getLat().",".$postCode->getLng()."\n";
} else {
    print "Not Found\n";
}


