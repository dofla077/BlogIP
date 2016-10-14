<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 16/09/2016
 * Time: 15:24
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{

    public function formAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        if ($request->isXmlHttpRequest()) {
            if ($form->handleRequest($request)->isValid() && $form->isSubmitted()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();

                $contactModal = $this->render('@App/components/contact-modal.html.twig',
                    [
                        'form'  => $form->createView(),
                    ]
                )->getContent();

                return new JsonResponse(array(
                    'data' => 'donné enregistré',
                    'contactModal' => $contactModal
                ));
            }
        }

        return $this->render('AppBundle:components:contact-modal.html.twig',
            [
                'form'  => $form->createView(),
            ]
        );
    }
}