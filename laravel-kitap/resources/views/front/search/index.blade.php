@extends("front.layouts.app")
@section("content")

    <div class="product">
        <div class="container">
            <div class="product-top">
                @foreach($datakitap->chunk(4) as $chunk)
                    <div class="product-one">
                        @foreach($chunk as $key=>$value)
                            <div class="col-md-3 product-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="{{route("kitap.detay" , ["selflink"=>$value["selflink"]])}}" class="mask">
                                        <img class="img-responsive zoom-img" src="{{asset($value["image"])}}" alt="" /></a>
                                    <div class="product-bottom">
                                        <h3>{{$value["name"]}}</h3>
                                        <p>{{\App\Yazarlar::getField($value["yazarid"],"name")}}</p>

                                        <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{$value["fiyat"]}}</span></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                @endforeach
                {{$datakitap->links()}}

                    @foreach($datakalem->chunk(4) as $chunk)
                        <div class="product-one">
                            @foreach($chunk as $key=>$value)
                                <div class="col-md-3 product-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="{{route("kalem.detay" , ["selflink"=>$value["selflink"]])}}" class="mask">
                                            <img class="img-responsive zoom-img" style="width:200px; height:200px;" src="{{asset($value["image"])}}" alt="" /></a>
                                        <div class="product-bottom">
                                            <h3>{{$value["name"]}}</h3>
                                            <p>{{\App\Kalemler::getField($value["markaid"],"name")}}</p>
                                            <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{$value["fiyat"]}}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                    {{$datakalem->links()}}
            </div>
        </div>
    </div>

@endsection
