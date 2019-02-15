<?php

namespace spec\GabyQuiles\Doctrine\GeoSpatial\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use GabyQuiles\Doctrine\GeoSpatial\Type\Point;
use GabyQuiles\Doctrine\GeoSpatial\Type\PointType;
use PhpSpec\ObjectBehavior;

class PointTypeSpec extends ObjectBehavior
{
    /**
     * @throws \Doctrine\DBAL\DBALException
     */
    function let()
    {
        if (!Type::hasType('point')) {
            Type::addType('point', PointType::class);
        }
        $this->beConstructedThrough('getType', ['point']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PointType::class);
    }

    function it_extends_DoctrineDbalTypes()
    {
        $this->shouldBeAnInstanceOf(Type::class);
    }

    function its_dql_name_is_point()
    {
        $this->getName()->shouldBe("point");
    }

    function it_transform_to_dql(AbstractPlatform $platform)
    {
        $this->getSQLDeclaration([], $platform)->shouldBe("POINT");
    }

    function it_can_convert_to_PHP_object(AbstractPlatform $platform)
    {
//        TODO: mock value and confirm values
        $phpValue = $this->convertToPHPValue('', $platform);
        $phpValue->shouldNotBeNull();
        $phpValue->shouldBeAnInstanceOf(Point::class);
    }

    function it_can_convert_to_database_value(AbstractPlatform $platform)
    {
//        TODO: mock value and confirm values
        $dbValue = $this->convertToDatabaseValue('', $platform);
        $dbValue->shouldNotBeNull();
    }
}
