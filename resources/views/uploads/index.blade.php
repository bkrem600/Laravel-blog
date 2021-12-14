<!doctype html>

<title>Boryana's Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div class="mt-8 md:mt-0">
                <a href="{{ url('/') }}" class="text-xs font-bold uppercase">Home Page</a>
            </div>
        </nav>

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <ol type="1">
                @foreach ($uploads as $upload)
                <li value="{{ $upload->id }}">
                    <a href='{{ url("/uploads/$upload->id/file/{$upload->originalName}") }}' class="underline text-sm text-gray-600 hover:text-gray-900">
                        {{ $upload->originalName }}</a>
                    <a href='{{ url("/uploads/$upload->id") }}' class="underline text-sm text-gray-600 hover:text-gray-900">
                        {{ $upload->title }}
                    </a>
                    @auth
                    <h2 class="font-semibold text-m text-gray-800">
                        Owner: {{ $upload->user->name  }}
                    </h2>
                    <div class="relative flex lg:inline-flex items-center space-x-3">
                        <form method="POST" action='{{ url("/uploads/$upload->id/edit") }}' style="display: inline!important;">
                            @csrf
                            @method('get')
                            <x-button>Edit</x-button>
                        </form>
                        <form method="POST" action='{{ url("/uploads/$upload->id") }}' style="display: inline!important;">
                            @csrf
                            @method('delete')
                            <x-button>Delete</x-button>
                        </form>
                    </div>
                    @endauth
                </li>
                @endforeach
            </ol>

            @if (session('operation'))
            {{ session('operation') }} {{ session('id') }}
            @endif
            @auth
            <p class="font-semibold">
                <a class="hover:underline"
                href='{{ url('/uploads/create') }}'>Add a file</a>
            </p>
            @isset($operation)
            <br>
            {{ $operation }}
            {{ $id }}
            @endisset
            {{-- <br> I am {{ Auth::user()->name }}
            and not a number {{ Auth::user()->id }} --}}
            @endauth
            <p class="font-semibold">
                <a class="hover:underline" href="{{ url('/') }}">Back to Blog</a>
            </p>
            @guest
            <p class="font-semibold">
                <a href="{{ url('/register') }}" class="hover:underline">Register</a> or
                <a href="{{ url('/login') }}" class="hover:underline">Login</a> to add, update or delete an upload.
            </p>
            @endguest
        </main>
    </section>
</body>
