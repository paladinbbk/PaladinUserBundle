<?php

namespace Paladin\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Paladin\UserBundle\Model\UserInterface;

/**
 * @ORM\MappedSuperclass
 */
class User implements UserInterface
{
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="array", length=255)
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $salt;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $confirmationToken;
    
    private $plainPassword;

    public function __construct() {}

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getRoles(): ?array
    {
        $roles = $this->roles;
        $roles[] = static::ROLE_DEFAULT;
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }
    
    public function getConfirmationToken(): ?string
    {
        return $this->confirmationToken;
    }

    public function setConfirmationToken(string $confirmationToken): self
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }
}
