<?php

require  __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'src-bin'.DIRECTORY_SEPARATOR.'bootstrap.php';


/**
 *
 * @link https://github.com/JMB-Technology-Limited/OSData
 * @license https://raw.github.com/JMB-Technology-Limited/OSData/master/LICENSE.md 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */


$inDir = $argv[1];

$outDir = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'codepointopen'.DIRECTORY_SEPARATOR;

$dataAdaptor = new \JMBTechnologyLimited\OSData\CodePointOpen\FileDataAdaptor($outDir);

$service = new \JMBTechnologyLimited\OSData\CodePointOpen\CodePointOpenService($dataAdaptor);

$service->loadData($inDir);

print "Done";


