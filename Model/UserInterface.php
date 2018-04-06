<?php

namespace Paladin\UserBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface as BaseUserInterface;

interface UserInterface extends BaseUserInterface
{
    const ROLE_DEFAULT = 'ROLE_USER';
}
