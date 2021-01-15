<?php

namespace App\Utility;

class Hash
{
    public static function generate(): string
    {
        try {
            return bin2hex(random_bytes(8));
        } catch (\Exception $e) {
            return uniqid(null, false);
        }
    }
}