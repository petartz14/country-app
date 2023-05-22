<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * @method static string Success()
 * @method static string Failure()
 */
enum NotificationType: string
{
    case Success = 'success';
    case Failure = 'failure';
}