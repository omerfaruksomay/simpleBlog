@isset($categories)
<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Kategoriler
        </div>
        <div class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item @if(request()->segment(2)==$category->slug) active disabled @endif ">
                    <a href="{{route('category',$category->slug)}}" class="list-group-item">{{$category->name}}
                        <span class="badge bg-primary rounded float-end text-white">{{$category->articleCount()}}</span>
                     </a>
                </li>
            @endforeach

        </div>
    </div>
</div>
@endisset
