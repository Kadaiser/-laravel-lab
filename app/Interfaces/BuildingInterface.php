<?php

namespace App\Interfaces;

interface BuildingInterface
{
    public function getNumFloors();
    public function getFloors();
    public function getRooms();
}