<?php

namespace App\Enums;

enum Role: string
{
    case Student = 'student';
    case Staff = 'staff';
    case Officer = 'officer';
    case SuperAdmin = 'super_admin';

    public function label(): string
    {
        return match ($this) {
            self::Student => 'Student',
            self::Staff => 'Mahallah Staff',
            self::Officer => 'MMU/RSD Officer',
            self::SuperAdmin => 'Super Admin',
        };
    }

    /**
     * MMU/RSD Officers and Super Admins work across Mahallahs; everyone else
     * is limited to the Mahallah they belong to.
     */
    public function seesAllMahallahs(): bool
    {
        return in_array($this, [self::Officer, self::SuperAdmin], true);
    }
}
