<?php

namespace ZendFormElementTwigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ZendFormElementTwigBundle:Default:index.html.twig', array('name' => $name));
    }
}
