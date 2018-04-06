<?php

namespace Paladin\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationController extends Controller
{
    public function regForm()
    {
        return $this->render('@PaladinUser/Registration/regForm.html.twig');
    }

    public function registration()
    {
        return $this->render('@PaladinUser/Registration/regForm.html.twig');
    }
}
