<?php

namespace Paladin\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ResettingController extends Controller
{
    public function requestAction()
    {
        return $this->render('@PaladinUser/Resetting/request.html.twig');
    }
    
    public function sendEmailAction()
    {
        
    }
}
