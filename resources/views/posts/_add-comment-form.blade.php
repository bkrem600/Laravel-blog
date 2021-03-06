@auth
    <form method="POST" action="{{ url('/posts') }}/{{ $post->slug }}/comments" class="border border gray-200 p-6 rounded-xl">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
            <h2 class="ml-4">Want to say something about this post?</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                placeholder="Add your comment here..."></textarea>
            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-button>Post</x-button>
        </div>
    </form>
@else
    <p class="font-semibold">
        <a href="{{ url('/register') }}" class="hover:underline">Register</a> or
        <a href="{{ url('/login') }}" class="hover:underline">Login</a> to leave a comment.
    </p>
@endauth
