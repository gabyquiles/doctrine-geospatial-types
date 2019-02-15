<?php

namespace spec\GabyQuiles\Doctrine\GeoSpatial\DataTransformer;

use GabyQuiles\Doctrine\GeoSpatial\DataTransformer\PointTransformer;
use GabyQuiles\Doctrine\GeoSpatial\Type\Point;
use PhpSpec\ObjectBehavior;

class PointTransformerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PointTransformer::class);
    }

    function it_converts_point_from_array()
    {
        $locationArray = json_decode("{'lat': 27.7676008, 'lng': -82.64029149999999}", true);
        $pointObj = $this->fromArray($locationArray);
        $pointObj->shouldBeAnInstanceOf(Point::class);
//        TODO: Fix this next assertion
//        $pointObj->shouldBeEqualTo(new Point(27.7676008, -82.64029149999999));
    }
}
