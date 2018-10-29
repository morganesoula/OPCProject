<?php

// src/OpenClassRoom/PlatformBundle/Controller/AdvertController.php

namespace OpenClassRoom\PlatformBundle\Controller;


use OpenClassRoom\PlatformBundle\Entity\Advert;
use OpenClassRoom\PlatformBundle\Entity\Application;
use OpenClassRoom\PlatformBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AdvertController extends Controller {

    public function indexAction()
    {

        $listAdverts = array(
            array(
                'title' => 'Recherche développeur Symfony',
                'id' => 1,
                'author' => 'Alexandre',
                'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon.',
                'date' => new \DateTime()
            ),
            array(
                'title' => 'Mission de Webmaster',
                'id' => 2,
                'author' => 'Hugo',
                'content' => 'Nous recherchons un webmaster capable de maintenir notre site Internet.',
                'date' => new \DateTime()
            ),
            array(
                'title' => 'Offre de stage Webdesigner',
                'id' => 3,
                'author' => 'Mathieu',
                'content' => 'Nous proposons un poste pour Webdesigner.',
                'date' => new \DateTime()
            )

        );


        return $this->render('OpenClassRoomPlatformBundle:Advert:index.html.twig', array(
            'listAdverts' => $listAdverts
        ));
    }



    public function viewAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $advert = $em->getRepository("OpenClassRoomPlatformBundle:Advert")->find($id);


        if (null == $advert)
        {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas");
        }

        $listApplications = $em
            ->getRepository('OpenClassRoomPlatformBundle:Application')
            ->findBy(array('advert' => $advert));

        return $this->render('OpenClassRoomPlatformBundle:Advert:view.html.twig', array(
            'advert' => $advert,
            'listApplications' => $listApplications
        ));
    }



    public function addAction(Request $request)
    {
        $advert = new Advert();
        $advert->setTitle('Recherche développeur Symfony');
        $advert->setAuthor('Alexandre');
        $advert->setContent('Nous recherchons un développeur Symfony débutant sur Lyon.');

        $image = new Image();
        $image->setUrl('http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg');
        $image->setAlt('Job de rêve');

        $advert->setImage($image);

        $application1 = new Application();
        $application1->setContent("J'ai toutes les qualités requises");
        $application1->setAuthor("Marine");

        $application2 = new Application();
        $application2->setAuthor("Pierre");
        $application2->setContent("Je suis très motivé");

        $application1->setAdvert($advert);
        $application2->setAdvert($advert);

        $em = $this->getDoctrine()->getManager();

        $em->persist($advert);
        $em->persist($application1);
        $em->persist($application2);

        $em->flush();


        if ($request->isMethod('POST'))
        {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée');

            return $this->redirectToRoute('oc_platform_view', array(
                'id' => $advert->getId()
            ));
        }

        return $this->render('OpenClassRoomPlatformBundle:Advert:add.html.twig', array(
            'advert' => $advert
        ));
    }


    public function editAction($id, Request $request)
    {
        $advert = array(
            'title' => 'Recherche développeur Symfony',
            'id' => $id,
            'author' => 'Alexandre',
            'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon.',
            'date' => new \DateTime()
        );

        return $this->render('OpenClassRoomPlatformBundle:Advert:edit.html.twig', array(
            'advert' => $advert
        ));
    }


    public function deleteAction($id)
    {
        return $this->render('OpenClassRoomPlatformBundle:Advert:delete.html.twig');
    }


    public function menuAction()
    {
        $listAdverts = array(
            array(
                'id' => 2,
                'title' => 'Recherche développeur Symfony'
            ),
            array(
                'id' => 5,
                'title' => 'Mission de webmaster'
            ),
            array(
                'id' => 9,
                'title' => 'Offre de stage webdesigner'
            )
        );

        return $this->render("OpenClassRoomPlatformBundle:Advert:menu.html.twig", array(
            'listAdverts' => $listAdverts
        ));
    }


    public function byeAction()
    {
        $content = $this
            ->get('templating')
            ->render('OpenClassRoomPlatformBundle:Advert:bye.html.twig', array('firstname' => 'Morgane'));

        return new Response($content);
    }


}

