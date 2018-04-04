<?php

namespace Paladin\UserBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{

    /**
     * @Route("/login", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils) {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
                'last_username' => $lastUsername,
                'error' => $error,
        ));
    }

    /**
     * @Route("/login_check", name="security_login_check")
     */
    public function loginCheckAction() {}
    
    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction() {}
}
