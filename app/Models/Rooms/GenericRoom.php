<?php

namespace App\Models\Rooms;

use App\Models\Rooms\AbstractRoom;

class GenericRoom extends AbstractRoom 
{
       
    public function getType(){
        return 'Generic';
    }
}