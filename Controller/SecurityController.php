<?php

namespace Paladin\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    public function login(AuthenticationUtils $authenticationUtils) {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@PaladinUser/Security/login.html.twig', array(
                'last_username' => $lastUsername,
                'error' => $error,
        ));
    }

    public function loginCheck() {}

    public function logout() {}
}
