<nav class="flex justify-between items-center mb-4">
    <a href="/"
        ><img class="w-24" src="/images/logo.png" alt="" class="logo"
    /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @guest
            <li>
            <a href={{route('register')}} class="hover:text-laravel"
                ><i class="fa-solid fa-user-plus"></i> Register</a
            >
            </li>
            <li>
            <a href={{route('login')}} class="hover:text-laravel"
                ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a
            >
            </li>
        @endguest
        @auth
        <li>
            <a href={{route('register')}} class="hover:text-laravel"
            >
            <i class="fa-solid fa-user"></i>
            {{ auth()->user()->name }}
        </a>
        </li>
        <li>
            <a href="/gigs/manage" class="hover:text-laravel"
            >
            <i class="fa-solid fa-gear"></i>
            manage 
        </a>
        </li>
        <li>
            <a href={{route('logout')}} class="hover:text-laravel"
            >
            <i class="fa-solid fa-arrow-right-to-bracket"></i>

            logout
        </a>
        </li>
        @endauth
    </ul>
</nav>