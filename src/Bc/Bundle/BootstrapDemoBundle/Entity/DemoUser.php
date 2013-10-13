<?php

namespace Bc\Bundle\BootstrapDemoBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class DemoUser
{
    /** @var string */
    private $username;

    /** @var \DateTime */
    private $birthday;

    /** @var array */
    private $favoriteHobbits = [];

    /** @var integer */
    private $gender;

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
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

    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function getGender()
    {
        return $this->gender;
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

        $metadata->addPropertyConstraint('gender', new Assert\NotBlank());
    }
}
