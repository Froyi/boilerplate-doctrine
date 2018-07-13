<?php
declare(strict_types=1);

namespace Project\Module\User;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Project\Module\GenericValueObject\Name;

/**
 * Entity User
 *
 * @Entity(repositoryClass="UserRepository")
 * @Table(name="user")
 */
class User
{
    /**
     * @Id
     * @Column(type="string", name="userId")
     * @var string
     */
    protected $userId;

    /**
     * @Column(type="Name", name="firstname")
     * @var Name
     */
    protected $firstname;

    /**
     * @return string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return Name
     */
    public function getFirstname(): ?Name
    {
        return $this->firstname;
    }

    /**
     * @param Name $firstname
     */
    public function setFirstname(Name $firstname): void
    {
        $this->firstname = $firstname;
    }

}