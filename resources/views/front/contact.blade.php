@extends('front.layouts.master')
@section('content')
    <div class="col-md-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                Eksik ya da hatalı tuşlama yaptınız.
            </div>
        @endif
        @if(session('success'))
        <div class="alert alert-primary">
            {{session('success')}}
        </div>
        @endif
        <p>Bizimle iletişime geçebilirsiniz.</p>
        <div class="my-5">

            <form method="post" action="{{route('contact.post')}}">
                @csrf
                <div class="form-control">
                    <div class="form-group">
                        <label>Ad & Soyad</label>
                        <input type="text" class="form-control" value="{{old('name')}}" placeholder="Adınız Ve Soyadınızı giriniz" name="name" required>
                    </div>
                </div>

                <div class="form-control">
                    <div class="form-group">
                        <label>E mail</label>
                        <input type="email" class="form-control" value="{{old('email')}}" placeholder="E mailinizi giriniz" name="email" required>
                    </div>
                </div>

                <div class="form-control">
                    <div class="form-group">
                        <label>Konu</label>
                        <select class="form-control"  name="topic">
                            <option selected>Bir Konu seçiniz</option>
                            <option>Bilgi</option>
                            <option>Destek</option>
                            <option>Genel</option>
                        </select>
                    </div>
                </div>

                <div class="form-control">
                    <div class="form-group">
                        <label>Mesajınız</label>
                        <textarea rows="5" name="message" class="form-control" placeholder="mesajınız">{{old('message')}}</textarea>
                    </div>
                </div>
                <br>
                <div id="success">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton">Gönder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection


