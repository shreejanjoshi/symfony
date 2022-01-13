<?php

namespace App\Controller;

use App\Services\Capitalizes;
use App\Services\Dashes;
use App\Services\Logs;
use App\Services\Master;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DependencyController extends AbstractController
{
    #[Route('/dependency', name: 'dependency')]
    public function index(Request $request): Response
    {
        $capitalizes = new Capitalizes();
        $dashes = new Dashes();
        $logs = new Logs();
        $output = "";

        if ($request->isMethod("POST")){
            //saved input file
            $output = $request->request->get('output');
            //saved dropdown value
            $dropdown = $request->request->get('dropdown');

            if ($dropdown == "capitalize"){
                $master = new Master($capitalizes, $logs);
                $output = $master->transform($output);
                $master->logs($output);
            }
            elseif ($dropdown == "dashes"){
                $master = new Master($dashes, $logs);
                $output = $master->transform($output);
                $master->logs($output);
            }

        }

        return $this->render('dependency/index.html.twig', [
            'output' => $output,
        ]);
    }
}
