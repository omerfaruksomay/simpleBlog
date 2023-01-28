@extends('back.layouts.master')
@section('title','Yazı oluştur')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-danger">
                Eksik ya da hatalı giriş yaptınız..
            </div>
            @endif
            <form method="post" action="{{route('admin.makaleler.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Yazının Başlığı</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Yaznının Konusu</label>
                    <select class="form-control" name="category" required>
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Yazının İçeriği</label>
                    <textarea name="index" class="form-control" rows="20" required></textarea>
                </div>
                <div class="form-group">
                   <button href="{{route('admin.makaleler.store')}}" type="submit" class="btn btn-block btn-primary">Yazı oluştur</button>
                </div>
            </form>
        </div>
    </div>
@endsection
