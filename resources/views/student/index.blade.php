@foreach ($all_students as $item)
    Name : {{ $item->name }}
    <br />
    Email : {{ $item->email }}
    <br />
    @foreach ($item->rPhone as $single)
        {{ $single->phone }}<br />
    @endforeach
    <hr />
@endforeach
