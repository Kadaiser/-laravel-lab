<?php

namespace App\Interfaces;

interface RoomInterface
{
    public function getHeight();
    public function getWidth();
    public function getLength();
    public function getVolume();
}