<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render('dfp/homepage.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/{category}", name="category")
     */
    public function categoryAction($category, Request $request)
    {
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findByCategory( $category );
        return $this->render('dfp/category.html.twig', [
            'category' => $category,
            'posts'    => $posts
        ]);
    }

    /**
     * @Route("/{category}/{article}", name="article")
     */
    public function artcileAction($category, $article, Request $request)
    {
        $post = $this->getDoctrine()->getRepository('AppBundle:Post')->findOneBySlug( $article );
        return $this->render('dfp/article.html.twig', [
            'category' => $category,
            'post' => $post
        ]);
    }
}
