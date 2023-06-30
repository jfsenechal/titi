<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ApiController extends AbstractController
{
    public function __construct(private ArticleRepository $articleRepository)
    {
    }

    /**
     * https://symfony.com/blog/new-in-symfony-6-3-mapping-request-data-to-typed-objects
     * curl -X POST http://127.0.0.1:8000/api/new -H 'Content-Type: application/json' -d '{"name":"my super name","rating":3}'
     */
    #[Route('/new', name: 'api_new', format: 'json', methods: ['POST'])]
    public function index(#[MapRequestPayload] Article $article,): JsonResponse
    {
        try {
            $this->articleRepository->save($article,true);

            return $this->json(['id' => $article->getId()]);
        } catch (\Exception $exception) {
            return $this->json(['error' => $exception->getMessage()]);
        }
    }

}
