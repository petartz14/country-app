<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * @method static string INDIA()
 * @method static string PHILIPPINES()
 */
enum Countries : string 
{
    case INDIA = 'India';
    case PHILIPPINES = 'Philippines';
}