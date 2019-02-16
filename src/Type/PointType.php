<?php

namespace GabyQuiles\Doctrine\GeoSpatial\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class PointType extends Type
{
    const POINT = "point";

    /**
     * Gets the SQL declaration snippet for a field of this type.
     *
     * @param mixed[] $fieldDeclaration The field declaration.
     * @param AbstractPlatform $platform The currently used database platform.
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'POINT';
    }

    /**
     * Gets the name of this type.
     *
     * @return string
     *
     * @todo Needed?
     */
    public function getName()
    {
        return self::POINT;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        //Null fields come in as empty strings
        if ($value == '') {
            return null;
        }

        $data = unpack('x/x/x/x/corder/Ltype/dlat/dlon', $value);
        return new Point($data['lat'], $data['lon']);
    }
    
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!$value) return;

        return pack('xxxxcLdd', 1, 1, $value->getLatitude(), $value->getLongitude());
    }
}
