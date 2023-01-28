@extends('back.layouts.master')
@section('title','Sayfa Düzenle')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    Eksik ya da hatalı giriş yaptınız..
                </div>
            @endif
            <form method="post" action="{{route('admin.sayfalar.update',$page->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Sayfanın İsmi</label>
                    <input value="{{$page->title}}" type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Sayfanın İçeriği</label>
                    <textarea name="index" class="form-control" rows="20" required>{{$page->index}}</textarea>
                </div>
                <div class="form-group">
                    <button href="{{route('admin.sayfalar.store')}}" type="submit" class="btn btn-block btn-primary">Sayfa oluştur</button>
                </div>
            </form>
        </div>
    </div>
@endsection
