@extends('back.layouts.master')
@section('title','Tüm Sayfalar')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 float-left font-weight-bold text-primary">{{$pages->count()}} Yazı Bulundu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sayfa Başlığı</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                    </tr>
                    </thead>
                    @foreach($pages as $page)
                    <tbody>
                    <tr>
                        <td>{{$page->title}}</td>
                        <td>{{$page->created_at}}</td>
                        <td>
                            <a href="{{route('admin.sayfalar.edit',$page->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> Düzenle</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.sayfalar.destroy', $page->id)}}" method="post">
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
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
