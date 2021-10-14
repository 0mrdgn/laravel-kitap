@extends("front.layouts.admin")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route("admin.kalem.create")}}" class="btn btn-success">Yeni kalem ekle</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Kalemler</h4>
                            <p class="category">Burada eklenen kalemlerin listesini bulabilirsiniz.</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th>İsim</th>
                                    <th>Düzenle</th>
                                    <th>Sil</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key=>$value)
                                    <tr>
                                        <td>{{$value["name"]}}</td>
                                        <td><a href="{{route("admin.kalem.edit", ["id"=>$value["id"]])}}">Düzenle</a></td>
                                        <td><a href="{{route("admin.kalem.delete", ["id"=>$value["id"]])}}">Sil</a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{$data->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
