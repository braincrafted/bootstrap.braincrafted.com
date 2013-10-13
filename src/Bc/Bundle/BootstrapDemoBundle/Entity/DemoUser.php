<?php

namespace Bc\Bundle\BootstrapDemoBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class DemoUser
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var \DateTime */
    private $birthday;

    /** @var array */
    private $favoriteHobbits = [];

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setFavoriteHobbits($favoriteHobbits)
    {
        $this->favoriteHobbits = $favoriteHobbits;
        return $this;
    }

    public function getFavoriteHobbits()
    {
        return $this->favoriteHobbits;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('username', new Assert\NotBlank());
        $metadata->addPropertyConstraint('username', new Assert\Length(10));

        $metadata->addPropertyConstraint('favoriteHobbits', new Assert\All(array(
            'constraints' => array(
                new Assert\NotBlank()
            ),
        )));

        $metadata->addPropertyConstraint('birthday', new Assert\NotBlank());
    }
}
