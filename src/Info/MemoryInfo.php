<?php
/**
 * Created by PhpStorm.
 * User: ts
 * Date: 2019-03-08
 * Time: 01:54
 */

namespace TS\PhpSystemD\Info;


class MemoryInfo
{

    /** @var int */
    private $totalBytes;

    /** @var int */
    private $usedBytes;

    /** @var int */
    private $swapTotalBytes;

    /** @var int */
    private $swapUsedBytes;

    /**
     * MemoryInfo constructor.
     * @param int $totalKb
     * @param int $usedKb
     * @param int $swapTotalKb
     * @param int $swapUsedKb
     */
    public function __construct(int $totalKb, int $usedKb, int $swapTotalKb, int $swapUsedKb)
    {
        $this->totalBytes = $totalKb;
        $this->usedBytes = $usedKb;
        $this->swapTotalBytes = $swapTotalKb;
        $this->swapUsedBytes = $swapUsedKb;
    }

    /**
     * @return int
     */
    public function getTotalBytes(): int
    {
        return $this->totalBytes;
    }

    /**
     * @return int
     */
    public function getUsedBytes(): int
    {
        return $this->usedBytes;
    }

    /**
     * @return int
     */
    public function getSwapTotalBytes(): int
    {
        return $this->swapTotalBytes;
    }

    /**
     * @return int
     */
    public function getSwapUsedBytes(): int
    {
        return $this->swapUsedBytes;
    }


}
