@props(['post'])
<x-post-featured-card  />

    <div class="lg:grid lg:grid-cols-6">

            <x-post-card
            : post="$post"
            class=""
            />

    </div>
