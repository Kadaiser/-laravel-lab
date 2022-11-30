<?php

namespace App\Models\Sensors;

use App\Models\Sensors\AbstractSensor;

class GenericSensor extends AbstractSensor
{
    public function getType(){
        return 'Generic';
    }

}
