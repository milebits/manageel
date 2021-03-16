<?php

namespace App;

use JetBrains\PhpStorm\Pure;

class ManageEL
{
    public const API_VERSION = '1';
    public const WEB_VERSION = '1';
    public const MANAGE_EL_VERSION = '1.0.0';
    public const MANAGE_EL_BUILD = '1';
    public const MULTIPLIER = 1024;

    /**
     * @param int $count
     * @return int
     */
    #[Pure] public static function teraBytes(int $count = 1): int
    {
        return intval($count * self::gigaBytes() * self::MULTIPLIER);
    }

    /**
     * @param int $count
     * @return int
     */
    #[Pure] public static function gigaBytes(int $count = 1): int
    {
        return intval($count * self::megaBytes() * self::MULTIPLIER);
    }

    /**
     * @param int $count
     * @return int
     */
    #[Pure] public static function megaBytes(int $count = 1): int
    {
        return intval($count * self::MULTIPLIER);
    }
}
