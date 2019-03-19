<?php
/**
 * Created by PhpStorm.
 * User: ts
 * Date: 2019-03-08
 * Time: 13:25
 */

namespace TS\PhpSystemD\Info;


class UptimeInfo
{

    /** @var string */
    private $uptimePretty;

    /** @var float */
    private $loadAvg1;

    /** @var float */
    private $loadAvg5;

    /** @var float */
    private $loadAvg15;

    /**
     * UptimeInfo constructor.
     * @param string $uptimePretty
     * @param float $loadAvg1
     * @param float $loadAvg5
     * @param float $loadAvg15
     */
    public function __construct(string $uptimePretty, float $loadAvg1, float $loadAvg5, float $loadAvg15)
    {
        $this->uptimePretty = $uptimePretty;
        $this->loadAvg1 = $loadAvg1;
        $this->loadAvg5 = $loadAvg5;
        $this->loadAvg15 = $loadAvg15;
    }

    /**
     * @return string
     */
    public function getUptimePretty(): string
    {
        return $this->uptimePretty;
    }

    /**
     * @return float
     */
    public function getLoadAvg1(): float
    {
        return $this->loadAvg1;
    }

    /**
     * @return float
     */
    public function getLoadAvg5(): float
    {
        return $this->loadAvg5;
    }

    /**
     * @return float
     */
    public function getLoadAvg15(): float
    {
        return $this->loadAvg15;
    }


}
