<?php

namespace Paladin\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ResettingController extends Controller
{
    public function request()
    {
        return $this->render('@PaladinUser/Resetting/request.html.twig');
    }
    
    public function sendEmail(Request $request)
    {
        if (false) {
            //try to send
            
            //add flash error
            
            return $this->redirectToRoute('paladin_user_resetting_request');
        }
        
        return $this->redirectToRoute('paladin_user_resetting_check_email');
    }
    
    public function checkEmail()
    {
        return $this->render('@PaladinUser/Resetting/checkEmail.html.twig');
    }
    
    public function resetAction(Request $request, $token)
    {
        return $this->render('@PaladinUser/Resetting/reset.html.twig');
    }
}
