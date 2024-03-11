<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24 border-purple-300">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Login
            </h2>
        </header>

        <form method="POST" action="/users/authenticate">
            @csrf

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Email</label
                >
                <input
                    type="email"
                    class="border border-purple-300 rounded p-2 w-full"
                    name="email"
                    value="{{old('email')}}"
                    autocomplete="off"
                />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="inline-block text-lg mb-2"
                >
                    Password
                </label>


                    <div class="">
                        <input
                        type="password"
                        class="password border border-purple-300 rounded p-2 w-full"
                        name="password"
                        value="{{old('password')}}"
                        />
                        <div class="flex mt-2">
                            <input type='checkbox' id='showpwd' class="ml-1" onclick="togglePasswordVisibility()"/>
                            <label for="showpwd" class="text-xs ml-2">Show password</label>
                        </div>
                    </div>

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-purple-400 text-white rounded py-2 px-4 hover:bg-purple-800"
                >
                    Login
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="/register" class="text-purple-800"
                        >Register</a
                    >
                </p>
            </div>
        </form>
    </x-card>
</x-layout>