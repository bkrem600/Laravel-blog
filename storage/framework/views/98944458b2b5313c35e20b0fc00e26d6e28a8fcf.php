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
                <a href="<?php echo e(url('/uploads')); ?>" class="text-xs font-bold uppercase">
                    Uploads
                </a>
            </div>

            <div class="mt-8 md:mt-0">
                <?php if(Route::has('login')): ?>
                <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(url('/dashboard')); ?>" class="text-xs font-bold uppercase">Dashboard</a>
                <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="text-xs font-bold uppercase">Login</a>

                <?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>" class="text-xs font-bold uppercase">Register</a>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
                <a href="<?php echo e(url('/')); ?>" class="text-xs font-bold uppercase">Home Page</a>
                <a href="#newsletter" class="bg-gray-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        <header class="max-w-xl mx-auto mt-20 text-center">
            <h1 class="text-4xl">
                Latest <span class="text-gray-500">Blog</span> News
            </h1>

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
                <!--  Category -->
                <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
                    <div x-data="{ show: false }" @click.away="show=false">
                        <button @click="show = ! show" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                            <?php echo e(isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'); ?>

                            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                        </button>
                        <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display: none">
                            <a href="<?php echo e(url('/?')); ?><?php echo e(http_build_query(request()->except('category', 'page'))); ?>"
                                class="block text-left px-3 text-sm leading-6 hover:bg-gray-500
                                focus:bg-gray-500 hover:text-white focus:text-white">All</a>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(url('/?category=')); ?><?php echo e($category->slug); ?>&<?php echo e(http_build_query(request()->except('category', 'page'))); ?>" class="block text-left px-3 text-sm leading-6
                                hover:bg-gray-500 focus:bg-gray-500 hover:text-white focus:text-white
                                <?php echo e(isset($currentCategory) && $currentCategory->is($category) ? 'bg-gray-500 text-white' : ''); ?>"><?php echo e(ucwords($category->name)); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <!-- Search -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                    <form method="GET" action="">
                        <?php if(request('category')): ?>
                        <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
                        <?php endif; ?>
                        <input type="text" name="search" placeholder="Find something" class="bg-transparent placeholder-black font-semibold text-sm" value="<?php echo e(request('search')); ?>">
                    </form>
                </div>
            </div>
        </header>
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <?php if($posts->count() > 0): ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="lg:grid lg:grid-cols-1">
                <article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                    <div class="py-6 px-5">
                        <div>
                            <img src="https://picsum.photos/1200/300" alt="Blog Post illustration" class="rounded-xl">
                        </div>

                        <div class="mt-8 flex flex-col justify-between">

                            <header>
                                <div class="space-x-2">
                                    <h1 class="px-3 py-1 rounded-full text-gray-600 text-xs uppercase font-semibold" style="font-size: 12px"><?php echo e($post->category->name); ?></h1>
                                </div>

                                <div class="mt-4">
                                    <h1 class="text-3xl">
                                        <a href="<?php echo e(url('/posts')); ?>/<?php echo e($post->slug); ?>">
                                            <?php echo e($post->title); ?>

                                        </a>
                                    </h1>

                                    <span class="mt-2 block text-gray-400 text-xs font-bold">

                                        Published <time><?php echo e($post->created_at->diffForHumans()); ?></time>
                                    </span>
                                </div>
                            </header>

                            <div class="text-sm mt-2 space-y-4">
                                <?php echo $post->excerpt; ?>

                            </div>

                            <footer class="flex justify-between items-center mt-8">
                                <div class="flex items-center text-sm">
                                    <img src="https://i.pravatar.cc/60?u=" class="rounded-xl" alt="Avatar">
                                    <div class="ml-3">
                                        <h5 class="font-bold">
                                            <a href="<?php echo e(url('/?author=')); ?><?php echo e($post->author->name); ?>">
                                                <?php echo e($post->author->name); ?></a>
                                        </h5>
                                    </div>
                                </div>

                                <div>
                                    <a href="<?php echo e(url('/posts')); ?>/<?php echo e($post->slug); ?>" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
                                        Read More
                                    </a>
                                </div>
                            </footer>
                        </div>
                    </div>
                </article>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($posts->links()); ?>

            <?php else: ?>
            <p class="text-center">No posts yet. Please check back later.</p>
            <?php endif; ?>
        </main>
        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                    <form method="POST" action="<?php echo e(url('/newsletter')); ?>" class="lg:flex text-sm">
                        <?php echo csrf_field(); ?>
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="./images/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <div>
                                <input id="email" name="email" type="text" placeholder="Your email address" class="lg:bg-transparent pl-4 focus-within:outline-none">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-xs text-red-500"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <button type="submit" class="transition-colors duration-300 bg-gray-500 hover:bg-gray-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    <?php if(session()->has('success')): ?>
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="fixed bg-gray-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p><?php echo e(session('success')); ?></p>
    </div>

    <?php endif; ?>
</body>

</html>



<style>
    html {
        scroll-behavior: smooth;
    }

</style>
<?php /**PATH /home/ubuntu/blog1/resources/views/posts/index.blade.php ENDPATH**/ ?>