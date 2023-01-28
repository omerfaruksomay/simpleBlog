<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Psy\Util\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::orderBy('created_at','DESC')->get();
        return view('back.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories=Category::all();
        return view('back.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:5',
            'category'=>'required',
            'index'=>'required|min:50',
        ]);


        $article= new Article();
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->index=$request->index;
        $article->slug=\Illuminate\Support\Str::slug($request->title);
        $article->save();

        toastr()->success('Başarılı','Makale başaryla oluşturuldu');
        return redirect()->route('admin.makaleler.index');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::findOrFail($id);
        $categories=Category::all();
        return view('back.articles.edit',compact('categories','article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'min:5',
            'index'=>'min:50',
        ]);


        $article= Article::findOrFail($id);
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->index=$request->index;
        $article->slug=\Illuminate\Support\Str::slug($request->title);
        $article->save();

        toastr()->success('Başarılı','Yazı başaryla güncelendi');
        return redirect()->route('admin.makaleler.index');


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        Article::find($id)->delete();
        toastr()->info('Seçilen makale başarıyla silindi');
        return redirect(route('admin.makaleler.index'));
    }

    public function trashed($id){
        return $id;
    }
}
