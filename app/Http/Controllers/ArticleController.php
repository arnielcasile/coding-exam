<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Services\ArticleService;

class ArticleController extends Controller
{

    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->articleService->loadAllArticle();

        // return view('ArticleScreen', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        if($request->validator->fails())
        {
            return $request->validator->errors();
        }

        $data = [
            'user_id'   => $request['user_id'],
            'title'     => $request['title'],
            'content'   => $request['content']
        ];

        return $this->articleService->storeArticle($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->articleService->getArticle($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        if($request->validator->fails())
        {
            return $request->validator->errors();
        }

        $data = [
            'title'     => $request['title'],
            'content'   => $request['content']
        ];

        return $this->articleService->updateArticle($data, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->articleService->deleteArticle($id);
    }
}
