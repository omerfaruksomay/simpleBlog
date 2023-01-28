<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Psy\Util\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=Page::orderBy('created_at','DESC')->get();
        return view('back.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pages= new Page();
        $pages->title=$request->title;
        $pages->index=$request->index;
        $pages->slug=\Illuminate\Support\Str::slug($request->title);
        $pages->save();

        toastr()->success('Başarılı','Makale başaryla oluşturuldu');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page=Page::findOrFail($id);
        return view('back.pages.edit',compact('page'));
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


        $pages= Page::findOrFail($id);
        $pages->title=$request->title;
        $pages->index=$request->index;
        $pages->slug=\Illuminate\Support\Str::slug($request->title);
        $pages->save();

        toastr()->success('Başarılı','Sayfa başaryla güncelendi');
        return redirect()->route('admin.sayfalar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::find($id)->delete();
        toastr()->info('Seçilen sayfa başarıyla silindi');
        return redirect(route('admin.sayfalar.index'));
    }
}
