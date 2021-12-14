<!doctype html>

<title>Boryana's Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="{{ url('/uploads') }}" class="ml-6 text-xs font-bold uppercase">Uploads</a>
            </div>

            <div class="mt-8 md:mt-0">
                <a href="{{ url('/') }}" class="text-xs font-bold uppercase">Home Page</a>
            </div>
        </nav>
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <form method="POST" action='{{ url("/uploads/$id") }}' enctype="multipart/form-data">
                @csrf
                @method('put')
                <div>
                    <x-label for="upload" :value="__('Upload')" />
                    <x-input class="block mb-2 uppercase font-bold text-xs text-gray-700" type="file" name="upload" id="upload" required />
                    @error('upload')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <x-label for="title" :value="__('Title')" />
                    <input type="text" class="border border-gray-400 p-2 w-full" name="title" id="title" value="{{ old('title') }}">
                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <x-label for="content" :value="__('Content')" />
                    <textarea class="border border-gray-400 p-2 w-full" rows="5" name="content" id="content" required>
                    {{ old('content') }}</textarea>
                    @error('content')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                    <x-button>Change Upload</x-button>
                </div>
            </form>
            <div>
                @if (!empty($id))
                <p class="font-semibold">
                    <br>
                    <a class="hover:underline" href="{{ url('/uploads', [$id, $originalName]) }}">{{ $id }} {{ $originalName }}</a>
                    <br>
                    @if (substr($mimeType, 0, 5) == 'image') {
                    <img height="25%" width="25%" src="{{ url('/uploads', [$id, $originalName]) }}">
                    <br>
                    }
                    @endif
                    <a class="hover:underline" href='{{ url('/uploads') }}'>Uploads</a>
                </p>
                @endif
                <br>
                @isset($id)
                {{ $id }} <br> {{ $path }} <br> {{ $originalName }} <br> {{ $mimeType }}
                @endisset
            </div>
        </main>
    </section>
</body>
