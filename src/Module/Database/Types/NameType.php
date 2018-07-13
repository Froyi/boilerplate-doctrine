<?php
declare(strict_types=1);

namespace Project\Module\Database\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Project\Module\GenericValueObject\Name;

/**
 * Class NameType
 * @package     Project\Module\Database\Types
 */
class NameType extends Type
{

    /**
     * Gets the SQL declaration snippet for a field of this type.
     *
     * @param array                                     $fieldDeclaration The field declaration.
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform         The currently used database platform.
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        // TODO: Implement getSQLDeclaration() method.
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
        return 'Name';
    }

    /**
     * @param Name            $value
     * @param AbstractPlatform $platform
     *
     * @return mixed|null
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        return $value->getName();
    }

    /**
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return Name|null
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        return Name::fromString($value);
    }
}