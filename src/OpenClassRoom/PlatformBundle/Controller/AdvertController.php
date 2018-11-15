<?php

// src/OpenClassRoom/PlatformBundle/Controller/AdvertController.php

namespace OpenClassRoom\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use OpenClassRoom\PlatformBundle\Entity\Advert;
use OpenClassRoom\PlatformBundle\Form\AdvertEditType;
use OpenClassRoom\PlatformBundle\Form\AdvertType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{

    /**
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
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


    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @ParamConverter("advert", options={"mapping": {"advert_id": "id"}})
     */
    public function viewAction(Advert $advert, $id)
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


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Security("has_role('ROLE_AUTEUR')")
     */
    public function addAction(Request $request)
    {
        $advert = new Advert();
        $form = $this->get('form.factory')->create(AdvertType::class, $advert);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {

            $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée');

            return $this->redirectToRoute('oc_platform_view', array(
                'id' => $advert->getId()
            ));

        }

        return $this->render('OpenClassRoomPlatformBundle:Advert:add.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em
            ->getRepository('OpenClassRoomPlatformBundle:Advert')
            ->find($id);

        if (null === $advert) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }

        $form = $this->get('form.factory')->create(AdvertEditType::class, $advert);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

            return $this->redirectToRoute('oc_platform_view', array(
                'id' => $advert->getId()
            ));
        }

        return $this->render('OpenClassRoomPlatformBundle:Advert:edit.html.twig', array(
            'advert' => $advert,
            'form' => $form->createView()
        ));
    }


    /**
     * @param $request, $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em
            ->getRepository('OpenClassRoomPlatformBundle:Advert')
            ->find($id);

        if (null === $advert) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }

        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em->remove($advert);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', 'L\'annonce a bien été supprimée.');

            return $this->redirectToRoute('oc_platform_home');
        }

        return $this->render('OpenClassRoomPlatformBundle:Advert:delete.html.twig', array(
            'advert' => $advert,
            'form' => $form->createView(),
        ));
    }


    /**
     * @param $limit
     * @return \Symfony\Component\HttpFoundation\Response
     */
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


    public function traductionAction($name)
    {
        return $this->render('OpenClassRoomPlatformBundle:Advert:traduction.html.twig', array(
            'name' => $name
        ));

    }

    /**
     * @ParamConverter("json")
     */
    public function ParamConverterAction($json)
    {
        return new Response(print_r($json, true));
    }


}