<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    protected $articleModel;

    public function __construct(Article $articleModel)
    {
        $this->articleModel = $articleModel;
    }

    public function loadAllArticle()
    {
        try {
            return $this->articleModel->all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function storeArticle($data)
    {
        try {
            return $this->articleModel->create($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getArticle($id)
    {
        try 
        {
            return $this->articleModel->where('id',$id)->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateArticle($data, $id)
    {
        try 
        {
            return $this->articleModel->where('id',$id)->update($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deleteArticle($id)
    {
        try 
        {
            return $this->articleModel->where('id',$id)->delete();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}