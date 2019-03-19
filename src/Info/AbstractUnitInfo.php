<?php
/**
 * Created by PhpStorm.
 * User: ts
 * Date: 2019-03-08
 * Time: 14:47
 */

namespace TS\PhpSystemD\Info;


abstract class AbstractUnitInfo
{

    /** @var string */
    private $id;

    /** @var string|null */
    private $description;

    /** @var bool */
    private $active;

    /** @var bool */
    private $enabled;

    /** @var string */
    private $activeStatus;

    /** @var string */
    private $enabledStatus;

    /** @var string */
    private $statusText;

    /**
     * UnitInfo constructor.
     * @param string $id
     * @param string|null $description
     * @param bool $active
     * @param bool $enabled
     * @param string $activeStatus
     * @param string $enabledStatus
     * @param string $statusText
     */
    protected function __construct(string $id, ?string $description, bool $active, bool $enabled, string $activeStatus, string $enabledStatus, string $statusText)
    {
        $this->id = $id;
        $this->description = $description;
        $this->active = $active;
        $this->enabled = $enabled;
        $this->activeStatus = $activeStatus;
        $this->enabledStatus = $enabledStatus;
        $this->statusText = $statusText;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @return string
     */
    public function getActiveStatus(): string
    {
        return $this->activeStatus;
    }

    /**
     * @return string
     */
    public function getEnabledStatus(): string
    {
        return $this->enabledStatus;
    }

    /**
     * @return string
     */
    public function getStatusText(): string
    {
        return $this->statusText;
    }


}
