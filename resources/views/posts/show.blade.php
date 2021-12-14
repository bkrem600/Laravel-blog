{{-- <x-layout>
    @include('_posts-header')
    <article>
        <h1>{!! $post->title !!}</h1>

        <p>
            By <a href="../authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
            in <a href="../categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>

        <div>
            {!! $post->body !!}
        </div>

        <p>Published <time>{{ $post->created_at->diffForHumans() }}</time></p>
    </article>

    <p><a href="/blog">Go Back</a></p>
</x-layout> --}}
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

                <a href="#newsletter"
                    class="transition-colors duration-300 bg-gray-500 hover:bg-gray-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Subscribe
                    for Updates</a>
            </div>
        </nav>

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="https://picsum.photos/200" alt="Post Illustration" class="rounded-xl">
                    <p class="mt-4 block text-gray-400 text-xs font-bold">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>
                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="https://i.pravatar.cc/60?u=" alt="Author avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                {{ $post->author->name }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="{{ url('/') }}"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-gray-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Back to Posts
                        </a>
                        <div class="space-x-2">
                            <h1 class="px-3 py-1 rounded-full text-gray-600 text-xs uppercase font-semibold"
                                style="font-size: 12px">{{ $post->category->name }}</h1>
                        </div>
                    </div>
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>
                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $post->body !!}
                    </div>
                </div>
                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    @include('posts._add-comment-form')
                    @foreach ($post->comments as $comment)
                        <article class="flex bg-gray-100 p-6 rounded-xl border border-gray-200 space-x-4">
                            <div class="flex-shrink-0">
                                <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" width="60"
                                    height="60" class="rounded-xl">
                            </div>
                            <div>
                                <header>
                                    <h3 class="font-bold">{{ $comment->author->name }}</h3>
                                    <p class="text-xs">Posted
                                        <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                                    </p>
                                </header>
                                <p>{{ $comment->body }}</p>
                            </div>
                        </article>
                    @endforeach
                </section>
            </article>
        </main>

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16" id="newsletter">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                    <form method="POST" action="{{ url('/newsletter') }}" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="../images/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <div>
                                <input id="email" name="email" type="text" placeholder="Your email address" class="lg:bg-transparent pl-4 focus-within:outline-none">
                                @error('email')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="transition-colors duration-300 bg-gray-500 hover:bg-gray-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    @if(session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="fixed bg-gray-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{ session('success') }}</p>
    </div>

    @endif
</body>
