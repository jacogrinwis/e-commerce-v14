<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'ADMIN';
    case EDITOR = 'EDITOR';
    case USER = 'USER';

    public static function all(): array
    {
        return [
            self::ADMIN->value => 'Admin',
            self::EDITOR->value => 'Editor',
            self::USER->value => 'User',
        ];
    }
}
