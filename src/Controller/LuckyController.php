<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Random\RandomException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

// ...

class LuckyController extends AbstractController
{
    /**
     * @throws RandomException
     */
    #[Route('/')]
    #[Route('/lucky/number')]
    public function number(): Response
    {
        $number = random_int(0, 100000);
        // 1. Pad the integer with leading zeros to 6 digits ('000042')
        $padded = sprintf('%06d', $number);

// 2. Insert the hyphen between the two 3-digit halves
        $formatted = substr($padded, 0, 3) . '-' . substr($padded, 3, 3);

        return $this->render('lucky/number.html.twig', [
            'number' => $formatted,
        ]);
    }
}
