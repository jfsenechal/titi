<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Message;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/titi')]
class DefaultController extends AbstractController
{
    public function __construct(private ArticleRepository $articleRepository)
    {
    }

    #[Route('/default', name: 'app_default')]
    public function index(): Response
    {
        $articles = $this->articleRepository->findAllOrdered();


        $article = new Article();
        $article->setName('cocuouc');
      //  $this->articleRepository->save($article);


        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'articles' => $articles,
        ]);
    }

    #[Route('/show/{id}', name: 'app_article_show')]
    public function show(Article $article): Response
    {
      $article =  $this->articleRepository->findByName('article 1');
      dump($article);
        return $this->render('default/show.html.twig', [
            'article' => $article,
        ]);
    }

    #[Route('/page', name: 'app_default2')]
    public function page2(): Response
    {
        return $this->render('default/page.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
