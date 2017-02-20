<?php

namespace BlogBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    /**
     * @Route("/test")
     */
    public function testAction()
    {
        /** @var ArrayCollection $posts */
        $posts = $this->getDoctrine()->getRepository('BlogBundle:Post')->findAll();

        if ($posts->count() > 0) {
            // Get our service, so we have really pretty Controller without logic
            $this->get('blog.post_manager')->managePost($posts->first());
        }

        return $this->render('BlogBundle:Default:index.html.twig');
    }
}
