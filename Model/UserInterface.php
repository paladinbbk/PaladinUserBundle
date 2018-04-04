<?php

namespace Paladin\UserBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface as BaseUserInterface;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
interface UserInterface extends BaseUserInterface
{
    const ROLE_DEFAULT = 'ROLE_USER';
}
