<div class="flex items-center py-4 border-b justify-between">
    <div class="md:w-2/12">
        <h2 class="text-gray-500 text-lg font-bold"><a href="/" class="hover:text-red-500">The Holocaust</a></h2>
    </div>
    <div class="space-x-4 hidden md:block md:text-center md:w-8/12">
        <a href="/" class="hover:text-red-500">Home</a>
        <a href="/blog" class="hover:text-red-500">Blog</a>
        <a href="/quotes" class="hover:text-red-500">Quotes</a>
        <a href="/timeline" class="hover:text-red-500">Timeline</a>
        <a href="/gallery" class="hover:text-red-500">Gallery</a>
        <a href="/contact" class="hover:text-red-500">Contact</a>
    </div>
    <div class="space-x-4 hidden md:block md:text-right md:w-2/12 relative">
        @if(Auth::check())
            <p class="">{{ Auth::user()->name }}<button class="user-menu-toggle pl-2 text-sm text-red-500 hover:text-red-300">&#9660;</button></p>
            <div class="user-menu absolute flex flex-col w-full text-center bg-gray-100 top-10 right-0 p-4 space-y-4 hidden">
            <a href="/logout" class="hover:text-red-500">Logout</a>
            <a href="/profile/{{ Auth::user()->name_slug }}" class="hover:text-red-500">Profile</a>
            <a href="/support" class="hover:text-red-500">Support Tickets</a>
                @can('Admin')
                    <div class="border-t py-2">
                        <a href="admin" class="">Admin Area</a>
                    </div>
                @endcan
            </div>
        @else
            <a href="/login" class="hover:text-red-500">Login</a>
            <a href="/register" class="hover:text-red-500">Register</a>
        @endif

    </div> 

    <!-- Mobile Menu -->
    <div class="md:hidden">
        <button class="border block hover:text-red-500 hamburger">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>  
    <div class="mobile-nav absolute flex flex-col w-full left-0 top-0 text-center h-screen text-white font-bold bg-gray-900 p-10 space-y-5 hidden">
        <button class="close-nav absolute top-2 right-4 hover:text-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        </button>
        <a href="/" class="hover:text-red-500">Home</a>
        <a href="/blog" class="hover:text-red-500">Blog</a>
        <a href="/quotes" class="hover:text-red-500">Quotes</a>
        <a href="/timeline" class="hover:text-red-500">Timeline</a>
        <a href="/gallery" class="hover:text-red-500">Gallery</a>
        <a href="/about" class="hover:text-red-500">About</a>
        <a href="/contact" class="hover:text-red-500">Contact</a>     
        @if(Auth::check())
            <p class="">{{ Auth::user()->name }}<button class="mobile-user-menu-toggle pl-2 text-sm text-red-500 hover:text-red-300">&#9660;</button></p>
            <div class="mobile-user-menu relative flex flex-col w-full text-center p-4 space-y-4 ">
            <a href="/logout" class="hover:text-red-500">Logout</a>
            <a href="/profile/{{ Auth::user()->name_slug }}" class="hover:text-red-500">Profile</a>
            <a href="/support" class="hover:text-red-500">Support Tickets</a>
                @can('Admin')
                    <div class="border-t py-2">
                        <a href="admin" class="hover:text-red-500">Admin Area</a>
                    </div>
                @endcan
            </div>
        @else
            <a href="/login" class="hover:text-red-500">Login</a>
            <a href="/register" class="hover:text-red-500">Register</a>
        @endif  
    </div>
</div>