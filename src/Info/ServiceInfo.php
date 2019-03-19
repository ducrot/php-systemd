<?php
/**
 * Created by PhpStorm.
 * User: ts
 * Date: 2019-03-08
 * Time: 00:19
 */

namespace MototokCloud\System\Info;

class ServiceInfo extends AbstractUnitInfo
{

    /** @var string */
    private $type;

    /** @var bool|null */
    private $canStart;

    /** @var bool|null */
    private $canStop;

    /** @var bool|null */
    private $canReload;

    /** @var \DateTimeImmutable|null */
    private $lastStatusChange;

    /** @var string|null */
    private $user;


    /**
     * ServiceInfo constructor.
     * @param string $id
     * @param string $type
     * @param string|null $description
     * @param bool $active
     * @param bool $enabled
     * @param string $activeStatus
     * @param string $enabledStatus
     * @param string $statusText
     * @param bool|null $canStart
     * @param bool|null $canStop
     * @param bool|null $canReload
     * @param \DateTimeImmutable|null $lastStatusChange
     * @param string|null $user
     */
    public function __construct(string $id, string $type, ?string $description, bool $active, bool $enabled, string $activeStatus, string $enabledStatus, string $statusText, ?bool $canStart, ?bool $canStop, ?bool $canReload, ?\DateTimeImmutable $lastStatusChange, ?string $user)
    {
        parent::__construct($id, $description, $active, $enabled, $activeStatus, $enabledStatus, $statusText);
        $this->type = $type;
        $this->canStart = $canStart;
        $this->canStop = $canStop;
        $this->canReload = $canReload;
        $this->lastStatusChange = $lastStatusChange;
        $this->user = $user;
    }


    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool|null
     */
    public function getCanStart(): ?bool
    {
        return $this->canStart;
    }

    /**
     * @return bool|null
     */
    public function getCanStop(): ?bool
    {
        return $this->canStop;
    }

    /**
     * @return bool|null
     */
    public function getCanReload(): ?bool
    {
        return $this->canReload;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getLastStatusChange(): ?\DateTimeImmutable
    {
        return $this->lastStatusChange;
    }

    /**
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $this->user;
    }


}
