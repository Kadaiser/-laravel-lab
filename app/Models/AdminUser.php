<?php

namespace App\Models;

final class AdminUser extends User
{
    use Child;

    public function getRole()
    {
        return 'Admin';
    }
}