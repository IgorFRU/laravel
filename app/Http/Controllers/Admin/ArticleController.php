<?php

namespace app\Http\Controllers\Admin;

use app\Article;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array (            
            'title'         => 'АДМИН - Паркетный мир - Статьи',
            'articles'    => Article::orderBy('published', 'DESC')
                                    ->orderBy('id', 'DESC')
                                    ->paginate(10)
        );

        return view('admin.articles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - Создание статьи',
            'article' => [],
        );
        
        return view('admin.articles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        if (Cache::has('articleses_published')) {
            Cache::increment('articles_published');
        }
        
        return redirect()->route('admin.article.edit', $article)->with('success', 'Статья успешно добавлена. Теперь можно загрузить изображение.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $data = array (            
            'title' => 'АДМИН - Паркетный мир - Статьи',
            'article' => $article,
        );
        
        return view('admin.articles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
