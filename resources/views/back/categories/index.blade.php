@extends('back.layouts.master')
@section('title','Tüm Kategoriler')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6>Yeni kategori oluştur</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.category.create')}}">
                    @csrf
                    <div class="form-group">
                        <label>Kategori adı</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6>Tüm Kategoriler</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Kategori adı</th>
                            <th>Yazı sayısı</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        @foreach($categories as $category)
                            <tbody>
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->articleCount()}}</td>
                                <td>
                                    <a category-id="{{$category->id}}" title="Kategoriyi Düzenle" class=" edit-click btn btn-sm btn-primary"><i class="fa fa-pen"></i> Düzenle</a>
                                </td>
                                <td>
                                    <a category-id="{{$category->id}}" category-count="{{$category->articleCount()}}" title="Kategoriyi Sil" class=" remove-click btn btn-sm btn-danger"><i class="fa fa-times"></i> Sil</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Kategori Düzenle</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                    <form method="post" action="{{route('admin.category.update')}}">
                        @csrf
                        <div class="form-group">
                            <label>Kategori adı</label>
                            <input id="category" type="text" class="form-control" name="category">
                            <input type="hidden"  name="id" id="category_id">
                        </div>
                        <button type="submit" class="btn btn-success float-right" >Kaydet</button>
                    </form>
            </div>



        </div>
    </div>
</div>

<div class="modal" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Kategori Sil</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="articleAlert" class="alert-danger">

                </div>
                <br>

                <form method="post" action="{{route('admin.category.delete')}}">
                    @csrf
                    <input type="hidden" name="id" id="deleteId">
                    <button id="deleteButton" type="submit" class="btn btn-success float-right" >Sil</button>
                </form>

            </div>



        </div>
    </div>
</div>



@endsection
@section('js')
<script>
    $(function (){
        $('.remove-click').click(function (){
            id=$(this)[0].getAttribute('category-id');
            count=$(this)[0].getAttribute('category-count');
            if(id==1){
                $('#articleAlert').html('Bu kategori silinemez.');
                $('#deleteButton').hide();
                $('#deleteModal').modal();
                return;
            }


            $('#deleteId').val(id);
            $('#articleAlert').html('');

            if (count>0){
                $('#articleAlert').html('Bu kategoride '+count+' yazı bulunmaktadır. Silmek istdiğinize emin misiniz?');
            }
            $('#deleteModal').modal();

        });





        $('.edit-click').click(function (){
            id=$(this)[0].getAttribute('category-id');
            $.ajax({
                type:'GET',
                url:'{{route('admin.category.getdata')}}',
                data:{id:id},
                success:function (data){
                    console.log(data);
                    $('#category').val(data.name);
                    $('#category_id').val(data.id);
                    $('#editModal').modal();

                }
            })
        });



    })
</script>
@endsection
