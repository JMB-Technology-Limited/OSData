<?php


namespace JMBTechnologyLimited\OSData\CodePointOpen;


/**
 *
 * @link https://github.com/JMB-Technology-Limited/OSData
 * @license https://raw.github.com/JMB-Technology-Limited/OSData/master/LICENSE.md 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */

class PostCodeData {

    protected $lat;

    protected $lng;

    /**
     * PostCodeData constructor.
     * @param $lat
     * @param $lng
     */
    public function __construct($lat, $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }




}
