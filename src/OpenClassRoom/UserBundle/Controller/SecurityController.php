<?php

// src/OpenClassRoom/UserBundle/Controller/SecurityController.php

namespace OpenClassRoom\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{

    public function loginAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED'))
        {
            return $this->redirectToRoute('oc_platform_accueil');
        }

        $authentificationUtils = $this->get('security.authentication_utils');

        return $this->render('OpenClassRoomUserBundle:Security:login.html.twig', array(
            'last_username' => $authentificationUtils->getLastUsername(),
            'error'         => $authentificationUtils->getLastAuthenticationError()
        ));
    }

}