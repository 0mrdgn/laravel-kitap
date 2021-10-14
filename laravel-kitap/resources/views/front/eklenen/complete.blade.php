@extends("front.layouts.app")
@section("content")
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route("index")}}">Anasayfa</a></li>
                    <li class="active">Alışverişi Tamamla</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--contact-start-->
    <div class="contact">
        <div class="container">
            <div class="contact-top heading">
                <h2>Bilgileri Doldurunuz</h2>
            </div>
            @if(session("status"))
                {{session("status")}}
            @endif
            <div class="contact-text">
                <div class="col-md-12 contact-right">
                    <form action="{{route("eklenen.completeStore")}}" method="POST">
                        {{csrf_field()}}

                        <input type="text" name="adres" required placeholder="Adres">
                        @error('adres')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <input type="text" name="telefon" required placeholder="Telefon">
                        @error('telefon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <textarea name="mesaj" placeholder="Eklemek istediğiniz not varsa bu alana yazabilirsiniz..." ></textarea>
                        <div class="submit-btn">
                            <input type="submit" value="Alışverişi Tamamla">
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--contact-end-->

@endsection
