<?php

namespace App\Services;

use App\Repositories\ArticleRepository;

class ArticleService
{

    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function loadAllArticle()
    {
        return $this->articleRepository->loadAllArticle();
    }

    public function storeArticle($data)
    {
        return $this->articleRepository->storeArticle($data);
    }

    public function getArticle($id)
    {
        return $this->articleRepository->getArticle($id);
    }

    public function updateArticle($data, $id)
    {
        return $this->articleRepository->updateArticle($data, $id);
    }

    public function deleteArticle($id)
    {
        return $this->articleRepository->deleteArticle($id);
    }
}