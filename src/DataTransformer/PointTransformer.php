<?php

namespace GabyQuiles\Doctrine\GeoSpatial\DataTransformer;

use GabyQuiles\Doctrine\GeoSpatial\Type\Point;

class PointTransformer
{
    public function fromArray($pointArray)
    {
        return new Point($pointArray['lat'], $pointArray['lng']);
    }
}
