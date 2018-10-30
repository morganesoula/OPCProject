<?php

// src/OpenClassRoom/PlatformBundle/Controller/AdvertController.php

namespace OpenClassRoom\PlatformBundle\Controller;

use OpenClassRoom\PlatformBundle\Entity\Advert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{

    public function indexAction($page)
    {
        if ($page < 1) {
            throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
        }

        $nbPerPage = 3;

        $listAdverts = $this
            ->getDoctrine()
            ->getRepository("OpenClassRoomPlatformBundle:Advert")
            ->getAdverts($page, $nbPerPage);

        $nbPages = ceil(count($listAdverts)/$nbPerPage);

        if ($page > $nbPages)
        {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }

        return $this->render('OpenClassRoomPlatformBundle:Advert:index.html.twig', array(
            'listAdverts' => $listAdverts,
            'page' => $page,
            'nbPages' => $nbPages
        ));
    }



    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em->getRepository('OpenClassRoomPlatformBundle:Advert')->find($id);

        if (null === $advert) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }

        $listApplications = $em
            ->getRepository('OpenClassRoomPlatformBundle:Application')
            ->findBy(array('advert' => $advert))
        ;

        $listAdvertSkills = $em
            ->getRepository('OpenClassRoomPlatformBundle:AdvertSkill')
            ->findBy(array('advert' => $advert))
        ;

        return $this->render('OpenClassRoomPlatformBundle:Advert:view.html.twig', array(
            'advert'           => $advert,
            'listApplications' => $listApplications,
            'listAdvertSkills' => $listAdvertSkills,
        ));
    }



    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = new Advert();

        $formBuilder = $this
            ->get('form.factory')
            ->createBuilder(FormType::class, $advert)
            ->add('date', DateType::class)
            ->add('title', TextType::class)
            ->add('content', TextareaType::class)
            ->add('author', TextType::class)
            ->add('published', CheckboxType::class, array('required' => false))
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);

            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($advert);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée');

                return $this->redirectToRoute('oc_platform_view', array(
                    'id' => $advert->getId()
                ));
            }
        }

        return $this->render('OpenClassRoomPlatformBundle:Advert:add.html.twig', array(
            'form' => $form->createView()
        ));
    }



    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em
            ->getRepository('OpenClassRoomPlatformBundle:Advert')
            ->find($id);

        if (null === $advert) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }


        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
            return $this->redirectToRoute('oc_platform_view', array('id' => 5));
        }
        return $this->render('OpenClassRoomPlatformBundle:Advert:edit.html.twig', array(
            'advert' => $advert
        ));
    }



    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em
            ->getRepository('OpenClassRoomPlatformBundle:Advert')
            ->find($id);

        if (null === $advert) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }

        foreach ($advert->getCategories() as $category) {
            $advert->removeCategory($category);
        }

        $em->flush();

        return $this->render('OpenClassRoomPlatformBundle:Advert:delete.html.twig');
    }



    public function menuAction($limit)
    {
        $em = $this
            ->getDoctrine()
            ->getManager();

        $listAdverts = $em
            ->getRepository("OpenClassRoomPlatformBundle:Advert")
            ->findBy(
                array(),
                array('date' => 'desc'),
                $limit,
                0
            );

        return $this->render('OpenClassRoomPlatformBundle:Advert:menu.html.twig', array(
            'listAdverts' => $listAdverts
        ));
    }

}