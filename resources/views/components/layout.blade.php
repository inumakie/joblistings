<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />

        <!-- ROBOTO FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('/styles.css') }}">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Define the texts to be displayed
        var texts = ["Find your next programming job.", "Find your next programmer."];
        var textIndex = 0;
        var letterIndex = 0;
        var delay = 80; // Delay between each letter in milliseconds

        var textElement = document.getElementById('typing');

        function typeText() {
            if (letterIndex < texts[textIndex].length) {
                textElement.innerHTML += texts[textIndex].charAt(letterIndex);
                letterIndex++;
                setTimeout(typeText, delay);
            } else {
                textElement.classList.add('fadeOut'); // Add fadeOut class to trigger CSS animation
                setTimeout(eraseText, 2000); // Delay before erasing text
            }
        }

        function eraseText() {
            textElement.innerHTML = ""; // Clear the text
            textElement.classList.remove('fadeOut'); // Remove fadeOut class
            textIndex = (textIndex + 1) % texts.length; // Switch to the next text
            letterIndex = 0;
            setTimeout(typeText, delay); // Start typing the next text
        }

        // Start typing the first text
        setTimeout(typeText, 1000); // Delay before starting animation
    });
</script>

<script>
    function togglePasswordVisibility() {
        var passwordInputs = document.querySelectorAll('.password');
        
        // Convert NodeList to an array using Array.from
        var passwordInputsArray = Array.from(passwordInputs);
        
        // Loop through each input element in the array
        passwordInputsArray.forEach(function(input) {
            if (input.type === 'password') {
                input.type = "text";
            } else {
                input.type = "password";
            }
        });
    }
</script>




        <title>DevGigs | Find your next programming job </title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/" class='ml-2'
                ><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"/></a>
            <ul class="flex space-x-6 mr-6 text-lg">

                @auth
                <li>
                    <span class="">Welcome, {{auth()->user()->name}}</span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-purple-800"
                        ><i class="fa-solid fa-gear"></i>
                        Manage listings</a
                    >
                </li>
                <li>
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit" class='hover:text-purple-800'>
                            <i class="fa-solid fa-door-closed"></i>
                            Logout
                        </button>

                    </form>
                </li>

                @else
                <li>
                    <a href="/register" class="hover:text-purple-800"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-purple-800"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>

                @endauth
            </ul>
        </nav>

        <main>
            {{$slot}}
        </main>

        <x-flash-message/>
    </body>
</html>