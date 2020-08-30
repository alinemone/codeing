




<nav class="navbar navbar-home navbar-expand-lg navbar-light bg-darker nav-brand">
    <a class="navbar-brand siteTitle" href="{{route('index')}}">{{ config('app.name', 'CodiRun') }}</a>
    <a class="navbar-brand " href="{{route('index')}}"><div class="header-site-floating-logo"></div></a>

</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
    <div class="collapse navbar-collapse navs border-bottom" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            @foreach($categories as $category)
            <li>
                <a href="{{route('viewCategory',$category->slug)}}">{{$category->name}}</a>
                <ul>
                    @foreach($subcategories as $subCat)
                        @if($subCat->parent_id == $category->id)
                         <li><a href="/category/{{$category->slug}}/{{$subCat->slug}}">{{$subCat->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>

</nav>
