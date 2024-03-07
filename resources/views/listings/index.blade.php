<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @if(count($listings) == 0)
        <p>&lt; No listings found /&gt;</p>
    @endif

    @foreach($listings as $listing)
    <x-listing-card :listing="$listing"/>
    @endforeach

    </div>

    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>

    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-purple-900 text-white h-16 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2">DevGigs &copy; 2024, All Rights reserved</p>

    <a
        href="/listings/create"
        class="absolute right-10 bg-black text-white py-2 px-5"
        >Post a job</a
    >
</footer>
</x-layout>