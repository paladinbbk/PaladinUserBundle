<?php

namespace Paladin\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    public function showForm()
    {
        return $this->render('@PaladinUser/Registration/showForm.html.twig');
    }

    public function storeUser(Request $request)
    {
        $encoder = $this->get('security.password_encoder');
        $em = $this->get('doctrine.orm.entity_manager');
        
        $user = new \App\Entity\User;
        $user->setUsername($request->get('username'));
        $user->setSalt(md5(uniqid()));
        $user->setEmail($request->get('email'));
        $encoded = $encoder->encodePassword($user, $request->get('password'));
        $user->setPassword($encoded);
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('paladin_user_registration_success');
    }

    public function success()
    {
        return $this->render('@PaladinUser/Registration/success.html.twig');
    }
}
