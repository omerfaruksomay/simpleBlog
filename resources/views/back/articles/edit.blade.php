@extends('back.layouts.master')
@section('title','Yazı Düzenle')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-danger">
                Eksik ya da hatalı giriş yaptınız..
            </div>
            @endif
            <form method="post" action="{{route('admin.makaleler.update',$article->id)}}"  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Yazının Başlığı</label>
                    <input value="{{$article->title}}" type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Yaznının Konusu</label>
                    <select class="form-control" name="category" required>
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category)
                        <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Yazının İçeriği</label>
                    <textarea name="index" rows="20" class="form-control" id="editor" required>{{ $article->index }}</textarea>
                </div>
                <div class="form-group">
                   <button href="{{route('admin.makaleler.store')}}" type="submit" class="btn btn-block btn-primary">Yazıyı güncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
