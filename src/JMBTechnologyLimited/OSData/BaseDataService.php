<?php

namespace JMBTechnologyLimited\OSData;


/**
 *
 * @link https://github.com/JMB-Technology-Limited/OSData
 * @license https://raw.github.com/JMB-Technology-Limited/OSData/master/LICENSE.md 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */

abstract class BaseDataService {




    /**
     * @return boolean Was this successful?
     */
    abstract public function openConnection();

    abstract public function closeConnection();

    abstract public function loadData($sourceDir);



}
