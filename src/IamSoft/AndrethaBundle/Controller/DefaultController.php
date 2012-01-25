<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('IamSoftAndrethaBundle:Default:index.html.twig');
    }
}
