<?php
/**
 * Created by PhpStorm.
 * User: ts
 * Date: 2019-03-08
 * Time: 00:19
 */

namespace MototokCloud\System;

use Symfony\Component\Process\Process;

class SystemCtl
{


    /** @var string */
    private $command;


    /**
     * SystemCtl constructor.
     * @param string $command
     */
    public function __construct(string $command = 'systemctl')
    {
        $this->command = $command;
    }


    /**
     * @throws \UnexpectedValueException if service is not found
     * @param string $unit
     * @param int $numJournalLines
     * @return string
     */
    public function status(string $unit, int $numJournalLines = 0): string
    {
        $process = $this->runProcess(['status', $unit, '--lines', $numJournalLines]);
        if ($process->isSuccessful()) {
            return $process->getOutput();
        } else if ($process->getExitCode() === 3) {
            return $process->getOutput();
        } else {
            $msg = sprintf('Unable to get status for %s: %s', $unit, $process->getErrorOutput());
            throw new \UnexpectedValueException($msg);
        }
    }


    /**
     * @throws \UnexpectedValueException if service is not found
     * @param string $unit
     */
    public function stop(string $unit): void
    {
        $process = $this->runProcess(['stop', $unit]);
        if (!$process->isSuccessful()) {
            $msg = sprintf('Unable to stop %s: %s', $unit, $process->getErrorOutput());
            throw new \UnexpectedValueException($msg);
        }
    }


    /**
     * @throws \UnexpectedValueException if service is not found
     * @param string $unit
     */
    public function start(string $unit): void
    {
        $process = $this->runProcess(['start', $unit]);
        if (!$process->isSuccessful()) {
            $msg = sprintf('Unable to start %s: %s', $unit, $process->getErrorOutput());
            throw new \UnexpectedValueException($msg);
        }
    }


    /**
     * @throws \UnexpectedValueException if service is not found
     * @param string $unit
     * @return bool
     */
    public function isEnabled(string $unit): bool
    {
        $process = $this->runProcess(['is-enabled', $unit]);
        if ($process->isSuccessful()) {
            return true;
        }
        if (trim($process->getOutput()) === 'disabled') {
            return false;
        }
        $err = $process->getErrorOutput();
        if (empty ($err)) {
            $msg = sprintf('Unable to check if %s is enabled.', $unit);
            throw new \UnexpectedValueException($msg);
        } else {
            throw new \UnexpectedValueException($process->getErrorOutput());
        }
    }


    public function getEnabledStatus(string $unit): string
    {
        $process = $this->runProcess(['is-enabled', $unit]);
        return trim($process->getOutput());
    }


    public function isActive(string $unit): bool
    {
        $process = $this->runProcess(['is-active', $unit]);
        return $process->isSuccessful();
    }


    public function getActiveStatus(string $unit): string
    {
        $process = $this->runProcess(['is-active', $unit]);
        return trim($process->getOutput());
    }


    /**
     * @param string $unit
     * @param string $property
     * @return string|null
     */
    public function showProperty(string $unit, string $property): ?string
    {
        $value = $this->runProcess(['show', $unit, '-p', $property, '--value'])->getOutput();
        $value = trim($value);
        return empty($value) ? null : $value;
    }


    /**
     * @param string $unit
     * @param string[] $properties
     * @return array
     */
    public function showProperties(string $unit, string ...$properties): array
    {
        $args = ['show', $unit];
        foreach ($properties as $property) {
            array_push($args, '-p', $property);
        }
        $value = $this->runProcess($args)->getOutput();
        $matches = [];
        $ok = preg_match_all('/^([A-Za-z]+)=(.*)$/m', $value, $matches);
        if ($ok === false) {
            $msg = sprintf('regex error: %s', preg_last_error());
            throw new \LogicException($msg);
        }
        return array_combine($matches[1], $matches[2]);
    }


    /**
     * @throws \UnexpectedValueException if date could not be parsed
     * @param string $unit
     * @param string $property
     * @return \DateTimeImmutable|null
     */
    public function showPropertyDate(string $unit, string $property): ?\DateTimeImmutable
    {
        $value = $this->showProperty($unit, $property);
        if (is_null($value)) {
            return null;
        }
        return Formats::parseSystemDUSec($value);
    }


    /**
     * @throws \UnexpectedValueException if date could not be parsed
     * @param string $unit
     * @param string $property
     * @return bool|null
     */
    public function showPropertyBool(string $unit, string $property): ?bool
    {
        $value = $this->showProperty($unit, $property);
        if (is_null($value)) {
            return null;
        }
        if ($value === 'yes') {
            return true;
        }
        if ($value === 'no') {
            return true;
        }
        $msg = sprintf('Unable to parse %s property %s as boolean from value "%s".', $unit, $property, $value);
        throw new \UnexpectedValueException($msg);
    }


    protected function runProcess(array $args): Process
    {
        $commandline = [$this->command];
        array_push($commandline, ...$args);
        $process = new Process($commandline, null, null, null, 5);
        $process->run();
        return $process;
    }

}
