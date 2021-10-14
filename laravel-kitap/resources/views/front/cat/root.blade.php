

            @if(!$value->childrenCategories->isEmpty())

    <div class="top-nav">
        <ul>
            @foreach($value->childrenCategories as $sub)
                <li class="active"> {{$sub["name"]}} ({{$value->totalProducts()}})
                    @include("front.cat.root", ["value" => $sub] )
                </li>
            @endforeach
        </ul>
    </div>
@endif

