<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LearningController extends AbstractController
{
    // #[Route('/', name: 'learning')]
    // public function index(): Response
    // {
    //     return $this->render('learning/index.html.twig', [
    //         'controller_name' => 'LearningController',
    //     ]);
    // }

    /**
    * @Route("/about", name="about")
    * @param SessionInterface $session
    * @return RedirectResponse
    */
    public function about(SessionInterface $session): Response
    {
        if ($session->get('name')) {
            $name = $session->get('name');
            $date = new DateTime();
            $response = $this->render('learning/about.html.twig', [
                'name' => $name,
                'date' => $date,
            ]);
        }
        else {
            $response = $this->forward('App/Controller/LearningController::showName');
            
        }
        return $response;
    }

    /** 
     * @Route("/", name="showName")
     * @param SessionInterface $session
     * @return RedirectResponse
     */
    public function showName(SessionInterface $session): Response
    {
        if($session->get('name')){
            $name = $session->get('name');
        }else{
            $name = 'Unknown';
        }
        return $this->render('learning/showName.html.twig', [
            'name' => $name,
        ]);
    }

    /** 
     * @Route("/changeName", name="changeName")
     * @param SessionInterface $session
     * @return RedirectResponse
     */
    public function changeName(SessionInterface $session, Request $request): RedirectResponse
    {
        $name = $request->request->get('name');
        $session->set('name', $name);

        return $this->redirectToRoute('showName');
    }
}
