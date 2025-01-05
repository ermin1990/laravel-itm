@php
    $navLinks = [
        ['name' => 'Home', 'route' => route('home')],
        ['name' => 'Shop', 'route' => route('shop')],
        ['name' => 'About', 'route' => route('about')],
        ['name' => 'Contact', 'route' => route('contact')],
    ];

    if(\Illuminate\Support\Facades\Auth::user()) {
        $navLinks[] = ['name' => 'Profile', 'route' => route('profile.edit')];
    }else{
        $navLinks[] = ['name' => 'Login', 'route' => route('login')];
    }
@endphp

<nav class="m-3 bg-gray-200 flex justify-between items-center p-3 rounded shadow">
    <h3 class="text-2xl font-bold">Ermin Selimović</h3>

    <!-- Hamburger Menu for Smaller Screens -->
    <div class="lg:hidden">
        <button id="menu-toggle" class="text-black focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Navigation Links -->
    <ul id="menu" class="hidden lg:flex lg:items-center lg:space-x-6">
        @foreach($navLinks as $link)
            <li>
                <a class="px-3 py-2 text-black hover:bg-gray-300 rounded transition ease-in-out duration-300"
                   href="{{ $link['route'] }}">
                    {{ $link['name'] }}
                </a>
            </li>
        @endforeach
        @if(\Illuminate\Support\Facades\Auth::check())
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <input type="submit"
                           class="px-3 py-2 text-black hover:bg-gray-300 rounded transition ease-in-out duration-300"
                           value="{{__('Logout')}}">
                </form>
            </li>
        @endif

        @if(\Illuminate\Support\Facades\Session::get('products') != null)
            <li>{{  "|" }}
                <a class="px-3 py-2 text-black rounded transition ease-in-out duration-300 hover:bg-gray-300"
                   href="{{route('cart.index')}}">Korpa<span class=" font-bold text-green-500 m-2">({{ count(\Illuminate\Support\Facades\Session::get('products')) }})</span>
                </a>
            </li>
        @endif

    </ul>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu"
     class="fixed inset-y-0 left-0 w-64 bg-gray-200 transform -translate-x-full transition-transform duration-300 lg:hidden">
    <div class="p-4">
        <button id="menu-close" class="mb-4 text-black focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <ul class="space-y-4">
            @foreach($navLinks as $link)
                <li>
                    <a class="block px-3 py-2 text-black hover:bg-gray-300 rounded transition ease-in-out duration-300"
                       href="{{ $link['route'] }}">
                        {{ $link['name'] }}
                    </a>
                </li>
            @endforeach

            @if(\Illuminate\Support\Facades\Auth::check())
                <li>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <input type="submit"
                               class="px-3 py-2 text-black hover:bg-gray-300 rounded transition ease-in-out duration-300"
                               value="{{__('Logout')}}">
                    </form>
                </li>
            @endif
        </ul>
    </div>
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.remove('-translate-x-full');
    });

    menuClose.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-x-full');
    });
</script>
