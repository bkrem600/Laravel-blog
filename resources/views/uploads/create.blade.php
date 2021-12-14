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
            <section class="px-6 py-8">
                <div class="border border-gray-200 p-6 rounded-xl max-w-sm mx-auto">

                    <form method="POST" action="{{ url('/uploads') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="upload">
                                File
                            </label>
                            <input class="border border-gray-400 p-2 w-full" type="file" name="upload" id="upload" value="{{ old('upload') }}" required>
                            @error('upload')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                                Title
                            </label>
                            <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{ old('title') }}" required>
                            @error('title')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="content">
                                Content
                            </label>
                            <textarea class="border border-gray-400 p-2 w-full" name="content" id="content" required>{{ old('content') }}</textarea>
                            @error('content')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <x-button>Submit Upload</x-button>
                </div>
                </form>
                <br />
                <a href="{{ url('/uploads') }}" class="text-xs font-bold uppercase">Back to Uploads</a>
                </div>
            </section>
        </main>
    </section>
</body>
</html>

@if (!empty($id))
<br>
<a class="text-xs font-bold uppercase" href="{{ url('/uploads', [$id, 'file', $originalName]) }}">{{ $id }}
    {{ $originalName }}</a>
<br>
@if (substr($mimeType, 0, 5) == 'image')
<img height="25%" width="25%" src="{{ url('/uploads', [$id, $originalName]) }}">
<br>
@endif
@endif
