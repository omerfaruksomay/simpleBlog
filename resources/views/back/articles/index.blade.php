@extends('back.layouts.master')
@section('title','Tüm Yazılar')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 float-left font-weight-bold text-primary">{{$articles->count()}} Yazı Bulundu</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Makale Başlığı</th>
                        <th>Kategori</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Görüntüle</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                    </tr>
                </thead>
                @foreach($articles as $article)
                <tbody>
                    <tr>
                        <td>{{$article->title}}</td>
                        <td>{{$article->getCategory->name}}</td>
                        <td>{{$article->created_at}}</td>
                        <td>
                            <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Görüntüle</a>
                        </td>
                        <td>
                            <a href="{{route('admin.makaleler.edit',$article->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> Düzenle</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.makaleler.destroy', $article->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit" value="Delete"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection