<?php


namespace JMBTechnologyLimited\OSData\CodePointOpen;


use JMBTechnologyLimited\OSData\BaseDataService;

/**
 *
 * @link https://github.com/JMB-Technology-Limited/OSData
 * @license https://raw.github.com/JMB-Technology-Limited/OSData/master/LICENSE.md 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */

class CodePointOpenService extends BaseDataService {


    /** @var  InterfaceDataAdaptor */
    protected $dataAdaptor;

    /**
     * CodePointOpenService constructor.
     *
*@param InterfaceDataAdaptor $dataAdaptor
     */
    public function __construct( InterfaceDataAdaptor $dataAdaptor)
    {
        $this->dataAdaptor = $dataAdaptor;
    }


    /**
     * @return boolean Was this successful?
     */
    public function openConnection()
    {

    }

    public function closeConnection()
    {

    }

    public function loadData($sourceDir)
    {
        $this->dataAdaptor->loadData($sourceDir);
    }

    /** @return PostCodeData */
    public function getPostcode($postcode)
    {
        return $this->dataAdaptor->getPostcode($postcode);
    }

}

