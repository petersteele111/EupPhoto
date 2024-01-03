<div class="breadcrumb text-sm text-gray-500 mb-4 mt-4">
    @foreach ($segments as $i => $segment)
        <a href="{{ $segment['url'] }}" class="text-3xl text-blue-500 hover:text-blue-600">{{ $segment['name'] }}</a>
        @if($i < count($segments) - 1)
            <span class="mx-2 text-3xl">></span>
        @endif
    @endforeach
</div>