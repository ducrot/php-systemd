<?php
/**
 * Created by PhpStorm.
 * User: ts
 * Date: 2019-03-08
 * Time: 00:39
 */

namespace MototokCloud\System;


class Formats
{


    public static function parseSystemDUSec(string $uSec): \DateTimeImmutable
    {
        $date = \DateTimeImmutable::createFromFormat('D Y-m-d H:i:s T', $uSec);
        if ($date === false) {
            $msg = sprintf('Unable to parse %s as date.', $uSec);
            throw new \UnexpectedValueException($msg);
        }
        return $date;
    }

}
