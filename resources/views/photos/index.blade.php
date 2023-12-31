<x-app-layout>
    @foreach ($photos as $photo)
    <div>
        <img src="{{ $photo->url }}" alt="{{ $photo->name }}">
        <a href="{{ route('photos.edit', $photo->id) }}">Edit</a>
        <form method="POST" action="{{ route('photos.destroy', $photo->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
</x-app-layout>