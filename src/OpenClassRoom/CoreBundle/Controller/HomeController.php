<?php

// src/OpenClassRoomCoreBundle/Controller/HomeController.php

namespace OpenClassRoom\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function homeAction()
    {
        return $this->render('OpenClassRoomCoreBundle:Home:home.html.twig');
    }



    public function contactAction(Request $request)
    {
        $session = $request->getSession();

        $session->getFlashBag()->add('info', 'La page de contact n\'existe pas encore. Un peu de patience!');

        return $this->redirectToRoute('core_home');
    }
}
