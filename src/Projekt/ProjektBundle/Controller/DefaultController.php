<?php

namespace Projekt\ProjektBundle\Controller;
use Projekt\ProjektBundle\Entity\Event;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
         $product = $this->getDoctrine()
        ->getRepository('ProjektProjektBundle:Event');
         $results = $product->findAll();
        return $this->render('ProjektProjektBundle:Default:index.html.twig', array('results' => $results));
    }
    public function createAction(Request $request)
{
    $event = new Event();
//    $product->setName('drugi');
//    $product->setDate('2012-07-08 11:14:15.638276');
//    $product->setDescription('Lorem ipsum dsadolor');
//    $product->setLocalization('Lorem ipsumsasdadasd dolor');
$form = $this->createFormBuilder($event)
            ->add('name', 'text')
            ->add('date', 'date')
            ->add('localization', 'text')
            ->add('description', 'text')
            ->add('save', 'submit')
            ->getForm();
 $form->handleRequest($request);
  if ($form->isValid()) {
        // perform some action, such as saving the task to the database
 return $this->redirect($this->generateUrl('projekt_success'));
    $em = $this->getDoctrine()->getManager();
    $em->persist($event);
    $em->flush();
   
    }


  //  return new Response('Created product id '.$product->getId());
    return $this->render('ProjektProjektBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
}
 public function viewAction()
    {
        return $this->render('ProjektProjektBundle:Default:index.html.twig', array('name' => '$name'));
    }
}
