<?php

namespace App\Models;

class AdminUser extends User
{
    use Child;

    public function getRole()
    {
        return 'Admin';
    }
}