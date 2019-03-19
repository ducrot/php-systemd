<?php
/**
 * Created by PhpStorm.
 * User: ts
 * Date: 2019-03-08
 * Time: 00:19
 */

namespace TS\PhpSystemD\Info;

class TimerInfo extends AbstractUnitInfo
{

    /**
     * LastTriggerUSec
     * @var \DateTimeImmutable|null
     */
    private $lastTrigger;

    /**
     * NextElapseUSecRealtime
     * @var \DateTimeImmutable|null
     */
    private $nextElapse;

    /** @var string */
    private $unitId;


    /**
     * TimerInfo constructor.
     * @param string $id
     * @param string|null $description
     * @param bool $active
     * @param bool $enabled
     * @param string $activeStatus
     * @param string $enabledStatus
     * @param string $statusText
     * @param \DateTimeImmutable|null $lastTrigger
     * @param \DateTimeImmutable|null $nextElapse
     * @param string $unitId
     */
    public function __construct(string $id, ?string $description, bool $active, bool $enabled, string $activeStatus, string $enabledStatus, string $statusText, ?\DateTimeImmutable $lastTrigger, ?\DateTimeImmutable $nextElapse, string $unitId)
    {
        parent::__construct($id, $description, $active, $enabled, $activeStatus, $enabledStatus, $statusText);
        $this->lastTrigger = $lastTrigger;
        $this->nextElapse = $nextElapse;
        $this->unitId = $unitId;
    }


    /**
     * @return \DateTimeImmutable|null
     */
    public function getLastTrigger(): ?\DateTimeImmutable
    {
        return $this->lastTrigger;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getNextElapse(): ?\DateTimeImmutable
    {
        return $this->nextElapse;
    }

    /**
     * @return string
     */
    public function getUnitId(): string
    {
        return $this->unitId;
    }

}
