@extends('back.layouts.master')
@section('title','Mesajlar')
@section('content')
        <div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6>Tüm Kategoriler</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>İsim&Soyisim</th>
                                <th>E mail</th>
                                <th>Konu</th>
                                <th>Mesaj</th>
                                <th>Oluşturulma Tarihi</th>
                            </tr>
                            </thead>
                            @foreach($contacts as $contact)
                                <tbody>
                                <tr>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->topic}}</td>
                                    <td>{{$contact->message}}</td>
                                    <td>{{$contact->created_at}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>



@endsection

