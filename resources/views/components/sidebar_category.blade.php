

<h5 class="bg-faded px-3 py-2 rounded">Kategori</h5>
<ul class="list-group">
    
    @foreach (DB::table('category')->get() as $item)
        <li class="list-group-item"><a href="/category/getCategory/{{ $item->slug }}">{{ $item->category_name }}</a></li>        
    @endforeach

</ul>    
