<?php

namespace spec\GabyQuiles\Doctrine\GeoSpatial\Type;

use GabyQuiles\Doctrine\GeoSpatial\Type\Point;
use PhpSpec\ObjectBehavior;

class PointSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(18.2, 66.59);
    }

    function it_is_initializable_set_initial_data()
    {
        $this->shouldHaveType(Point::class);
        $this->getLatitude()->shouldBe(18.2);
        $this->getLongitude()->shouldBe(66.59);
    }

    function it_returns_a_float_for_latitude()
    {
        $this->getLatitude()->shouldBeFloat();
    }

    function it_returns_float_for_longitude()
    {
        $this->getLongitude()->shouldBeFloat();
    }

    function it_can_set_latitude_correctly()
    {
        $this->setLatitude(20.2);
        $this->getLatitude()->shouldBe(20.2);
    }

    function it_can_translate_to_string()
    {
        $this->__toString()->shouldBeString();
        $this->__toString()->shouldBe("POINT(18.200000 66.590000)");
    }
}
