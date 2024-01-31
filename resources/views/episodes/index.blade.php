<x-layout title="Episodes">
    <form method="post"> 
    <ul class="list-group">
    @foreach ($episodes as $episode)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episodes {{ $episode->number }}
            <input type="checkbox" name="episodes[]" value="{{$episode->id}}">
        </li>
    @endforeach
    </ul>
        <button class="btn btn-dark mt-2 mb-2">Save</button>
        </form>
</x-layout>
