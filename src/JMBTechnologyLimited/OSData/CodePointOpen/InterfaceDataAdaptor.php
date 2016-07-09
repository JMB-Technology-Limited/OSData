<?php


namespace JMBTechnologyLimited\OSData\CodePointOpen;

/**
 *
 * @link https://github.com/JMB-Technology-Limited/OSData
 * @license https://raw.github.com/JMB-Technology-Limited/OSData/master/LICENSE.md 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */


interface InterfaceDataAdaptor  {


    public function loadData($sourceDir);

    /** @return PostCodeData */
    public function getPostcode($postcode);


}
