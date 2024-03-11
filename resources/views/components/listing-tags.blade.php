@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex flex-wrap">
    @foreach($tags as $tag)
    <li class="flex items-center !w-fit justify-center bg-purple-800 text-white rounded-xl py-1 px-3 mr-2 mb-1 text-xs hover:bg-purple-600"
    >
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
</ul>