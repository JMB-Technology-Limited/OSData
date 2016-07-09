<?php

require __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

/**
 *
 * @link https://github.com/JMB-Technology-Limited/OSData
 * @license https://raw.github.com/JMB-Technology-Limited/OSData/master/LICENSE.md 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */

function autoload($class) {
    $f = __DIR__. DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.
        'src'.DIRECTORY_SEPARATOR.str_replace("\\", DIRECTORY_SEPARATOR, $class).'.php';
    if (file_exists($f)) {
        require_once $f;
        return;
    }
}
spl_autoload_register('autoload');
