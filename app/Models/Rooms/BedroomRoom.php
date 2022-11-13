<?php

namespace App\Models\Rooms;

use App\Models\Rooms\GenericRoom;

class BedroomRoom extends GenericRoom 
{

    public function getType(){
        return 'Bedroom';
    }
}