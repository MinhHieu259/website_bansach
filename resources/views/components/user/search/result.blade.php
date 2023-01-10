@if(count($books) > 0)
    @foreach($books as $book)
        <li class="list-group-item"><a href="{{ route('home.detail-book', $book)  }}">{{$book->title}}</a></li>
    @endforeach
@else
    <li class="list-group-item">No Results Found</li>
@endif
