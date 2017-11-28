<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ReviewController
 * @Route("review")
 */

class ReviewController extends Controller
{
    /**
     * @Route("/", name="review_index")
     * @method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $reviews = $em->getRepository('AppBundle:Review')->findAll();
        return $this->render('review/index.html.twig', array(
            'reviews' => $reviews,
        ));
    }

    /**
     * Creates a new review entity.
     *
     * @Route("/new", name="review_new")
     * @method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $review = new Review();

        return $this->render('review/new.html.twig', array(
            'review' => $review,

        ));
    }

}
