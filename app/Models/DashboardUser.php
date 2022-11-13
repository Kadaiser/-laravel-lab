<?php

namespace App\Models;

class DashboardUser extends User
{
    use Child;

    public function getRole()
    {
        return 'User';
    }
}