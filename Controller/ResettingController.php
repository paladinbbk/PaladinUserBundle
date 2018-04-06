<?php

namespace Paladin\UserBundle\Controller;

use App\Entity\User;
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
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findOneByUsername($request->get('username'));

        if (!$user) {

            //add flash error
            
            return $this->redirectToRoute('paladin_user_resetting_request');
        }

        $token = md5(uniqid());
        $user->setConfirmationToken($token);
        $em->flush();

        $mailer = $this->get('mailer');

        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('send@example.com')
            ->setTo('recipient@example.com')
            ->setBody($this->generateUrl('paladin_user_resetting_reset', ['token' => $token]),'text/html');

        $mailer->send($message);

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
