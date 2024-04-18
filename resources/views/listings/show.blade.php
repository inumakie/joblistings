<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-4">
        <x-card class="p-10 bg-purple-200">
            <div class="flex flex-col sm:flex-row items-center justify-center text-center">
                <div class="w-3/12 flex flex-col items-center justify-center">
                    <img
                        class="mb-6"
                        src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                        alt=""
                    />

                    <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                    <div class="text-xl font-bold mb-4">{{$listing->company}}</div>

                    <x-listing-tags :tagsCsv="$listing->tags" :isShowView="true"/>
                        
                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                    </div>
                </div>
                
                <div class="w-9/12 mx-0 sm:mx-28">
                    <h3 class="text-xl md:text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="w-full text-sm sm:text-lg space-y-6 flex flex-col justify-center items-center">
                        {{$listing->description}}

                        <div class="mt-10 flex justify-center items-center gap-4">
                            <a
                            href="mailto:{{$listing->email}}"
                            class="block px-4 bg-purple-400 text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                            >

                            <a
                                href="{{$listing->website}}"
                                target="_blank"
                                class="block px-4 bg-black text-white py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-globe"></i> Visit
                                Website</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </x-card>

{{--    <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/listings/{{$listing->id}}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form method="POST" action="/listings/{{$listing->id}}">
                @method('DELETE')
                @csrf
                <button class="text-red-500">
                    <i class="fa-solid fa-trash"></i>
                    Delete
                </button>
            </form>
        </x-card> --}}
    </div>

</x-layout>