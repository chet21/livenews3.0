<div class="container-fluid" style="height: 50px; background: rgb(31, 32, 36)">
    <div class="container">
        <div class="row">
            <a style="color: #7BCEF8; font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px; text-decoration: none" href="/">Головна</a>
            @foreach(\App\Models\Category::whereHas('articles', function ($query) {
                    $query->where('img', '!=', '');
                }, '>', 8)->get()->sortBy('position') as $category)
                <span style="font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px">
                    <a style="color: white; " href="/category/{{ $category->slug }}">{{ $category->title_ua }}</a>
                </span>
            @endforeach
        </div>
    </div>
</div>
