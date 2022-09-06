<?php

namespace App\Controller;


use App\Entity\Serie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/series", name="serie_")
 */

class SerieController extends AbstractController
{
    /**
     * @Route("", name="list")
     */
    public function list(): Response
    {
        return $this->render('serie/list.html.twig', [
        ]);
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(int $id): Response
    {
        return $this->render('serie/details.html.twig');
}

    /**
     * @Route("/create", name="create")
     */
public function create():Response{
        return $this->render('serie/create.html.twig');
}

  /**
   * @Route("/demo",name="em-demo")
   */
public function demo(EntityManagerInterface $entityManager):Response{

    $serie = new Serie();
    $serie->setName('pif');
    $serie->setBackdrop('dafsd');
    $serie->setPoster('dafsd');
    $serie->setDateCreated(new \DateTime());
    $serie->setFirstAirDate(new \DateTime("-1 year"));
    $serie->setLastAirDate(new \DateTime("-6 month"));
    $serie->setGenres('drama');
    $serie->setOverview('bla bla bla');
    $serie->setPopularity(123.00);
    $serie->setVote(8.2);
    $serie->setStatus('Canceled');
    $serie->setTmdbId(329432);

    dump($serie);

    // $entityManager = $this->getDoctrine()->getManager()

    $entityManager->persist($serie);
    $entityManager->flush();

    dump($serie);
    //$entityManager->remove($serie);
    $serie->setGenres('comedy');
    $entityManager->flush();

    return $this->render('serie/create.html.twig');
}

}