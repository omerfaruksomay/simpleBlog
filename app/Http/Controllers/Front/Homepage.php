<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
class Homepage extends Controller
{
    public function __construct()
    {

        view()->share('pages',Page::get());
        view()->share('categories',Category::get());

    }


    public function index(){

        $data['articles']=Article::orderBy('created_at','DESC')->Paginate(4);
        return view('front.homepage',$data);
    }

    public function single($category,$slug){
        Category::whereSlug($category)->first() ?? abort(403,'Kayboldun sanırım');
        $data['article']=Article::where('slug',$slug)->first() ?? abort(403,'Kayboldun sanırım');
        return view('front.single',$data);

    }

    public function category($slug){

           $category=Category::whereSlug($slug)->first() ?? abort(403,'Kayboldun sanırım');
           $data['category']=$category;
           $data['articles']=Article::where('category_id',$category->id)->get();
           return view('front.category',$data);

    }
    public function page($slug){
        $page=Page::whereSlug($slug)->first() ?? abort(403,'Kayboldun sanırım');
        $data['page']=$page;
        return view('front.page',$data);
    }

    public function contact(){
        return view('front.contact');
    }

    public function contactpost(Request $request){

        $request->validate([
            'name'=>'required|min:5',
            'email'=>'required|email',
            'topic'=>'required',
            'message'=>'required|min:10'
        ]);

        $contact=new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        toastr()->success('Başarılı','Mesajınız başarıyla iletildi');
        return redirect()->route('contact');
    }

}
