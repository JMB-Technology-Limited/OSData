<?php

namespace JMBTechnologyLimited\OSData\CodePointOpen;

use JMBTechnologyLimited\OSData\BaseDataAdaptor;
use JMBTechnologyLimited\OSMaths\EastingNorthing;

/**
 *
 * @link https://github.com/JMB-Technology-Limited/OSData
 * @license https://raw.github.com/JMB-Technology-Limited/OSData/master/LICENSE.md 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 */

class FileDataAdaptor extends BaseDataAdaptor implements  InterfaceDataAdaptor {

    protected $dir;

    /**
     * FileDataAdaptor constructor.
     * @param $dir
     */
    public function __construct($dir)
    {
        $this->dir = $dir;
    }


    public function loadData($sourceDir) {

        $handleDir = null;

        if ($handleDir = opendir($sourceDir)) {
            while (false !== ($entry = readdir($handleDir))) {
                if ($entry != '.' && $entry != '..' && substr($entry, -4) == '.csv') {

                    ## Setup
                    $outputfiles = array();

                    ## Stage 1: loop over each file
                    print "Starting " . $entry . "\n";
                    if (($handle = fopen($sourceDir . DIRECTORY_SEPARATOR . $entry, "r")) !== FALSE) {
                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                            if (count($data) > 3) {

                                $postcode = strtoupper(str_replace(" ", "", $data[0]));
                                $latLng =(new EastingNorthing($data[2], $data[3]))->toLatLngOSGB36()->toLatLngWGS84();
                                $postcodeTwoChars = substr($postcode, 0, 2);

                                if (!isset($outputfiles[$postcodeTwoChars])) {
                                    $outputfiles[$postcodeTwoChars] = fopen($this->dir . DIRECTORY_SEPARATOR . $postcodeTwoChars . ".tmp.csv", 'w');
                                    if (!$outputfiles[$postcodeTwoChars]) {
                                        die("Could not open output file: " . $this->dir . DIRECTORY_SEPARATOR . $postcodeTwoChars . ".tmp.csv\n\n");
                                    }
                                }
                                fwrite($outputfiles[$postcodeTwoChars], '"' . $postcode . '",' . $latLng->getLat() . ',' . $latLng->getLng() . "\n");

                            }
                        }
                        fclose($handle);
                    }
                    ## Stage 2: close all open files
                    print "Cleaning up " . $entry . "\n";
                    foreach ($outputfiles as $key => $fh) {
                        fclose($fh);
                    }

                    ## Stage 3: Copy
                    print "Installing " . $entry . "\n";
                    foreach ($outputfiles as $key => $fh) {
                        rename($this->dir . DIRECTORY_SEPARATOR . $key . ".tmp.csv", $this->dir . DIRECTORY_SEPARATOR . $key . ".csv");
                    }


                }
            }
            closedir($handleDir);
            return true;
        }

        return false;

    }


    /** @return PostCodeData */
    public function getPostcode($postcode)
    {

        $postcode = strtoupper(str_replace(" ","",$postcode));
        $postcodeTwoChars = substr($postcode, 0,2);

        $ourfile = $this->dir.DIRECTORY_SEPARATOR.$postcodeTwoChars.'.csv';

        if (is_file($ourfile)) {
            if (($handle = fopen($ourfile, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if (count($data) > 2 && $data[0] == $postcode) {
                        fclose($handle);
                        return new PostCodeData($data[1], $data[2]);
                    }
                }
                fclose($handle);
            }
        }

        return null;

    }
}
