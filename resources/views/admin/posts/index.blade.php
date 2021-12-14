<!doctype html>

<title>Boryana's Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="{{ url('/uploads') }}" class="text-xs font-bold uppercase">
                    Uploads
                </a>
            </div>

            <div class="mt-8 md:mt-0">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="text-xs font-bold uppercase">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-xs font-bold uppercase">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-xs font-bold uppercase">Register</a>
                @endif
                @endauth
                @endif
                <a href="{{ url('/') }}" class="text-xs font-bold uppercase">Home Page</a>

                <a href="#newsletter" class="bg-gray-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        <section class="py-8 max-w mx-auto">
            <div class="border border-gray-200 p-6 rounded-xl max-w mx-auto">
                <h1 class="text-lg font-bold mb-4">
                    Edit or Delete Posts
                </h1>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="{{ url('/posts') }}/{{ $post->slug }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $post->category->name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $post->author->name }}
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Published &nbsp;<time>{{ $post->created_at->diffForHumans() }}</time>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ url('/admin/posts') }}/{{ $post->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                {{-- <a href="/admin/posts/{{ $post->id }}/delete" class="text-indigo-600 hover:text-indigo-900">Delete</a> --}}
                                                <form method="POST" action="{{ url('/admin/posts') }}/{{ $post->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                        <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
                    <h5 class="text-3xl">Stay in touch with the latest posts</h5>
                    <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>

                    <div class="mt-10">
                        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                            <form method="POST" action="{{ url('/newsletter') }}" class="lg:flex text-sm">
                                @csrf
                                <div class="lg:py-3 lg:px-5 flex items-center">
                                    <label for="email" class="hidden lg:inline-block">
                                        {{-- <img src="/images/mailbox-icon.svg" alt="mailbox letter"> --}}
                                    </label>
                                    <div>
                                        <input id="email" name="email" type="text" placeholder="Your email address" class="lg:bg-transparent pl-4 focus-within:outline-none">
                                        @error('email')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="transition-colors duration-300 bg-gray-500 hover:bg-gray-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </footer>
            </div>
        </section>
    </section>
    @if(session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="fixed bg-gray-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{ session('success') }}</p>
    </div>
    @endif
</body>
