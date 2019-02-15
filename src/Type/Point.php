<?php

namespace GabyQuiles\Doctrine\GeoSpatial\Type;

class Point
{
    private $latitude;

    private $longitude;

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function __toString()
    {
        return sprintf("POINT(%f %f)", $this->latitude, $this->longitude);
    }
}
