<!doctype html>

<title>Boryana's Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div class="mt-8 md:mt-0">
                <a href="<?php echo e(url('/')); ?>" class="text-xs font-bold uppercase">Home Page</a>
            </div>
        </nav>

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <ol type="1">
                <?php $__currentLoopData = $uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li value="<?php echo e($upload->id); ?>">
                    <a href='<?php echo e(url("/uploads/$upload->id/file/{$upload->originalName}")); ?>' class="underline text-sm text-gray-600 hover:text-gray-900">
                        <?php echo e($upload->originalName); ?></a>
                    <a href='<?php echo e(url("/uploads/$upload->id")); ?>' class="underline text-sm text-gray-600 hover:text-gray-900">
                        <?php echo e($upload->title); ?>

                    </a>
                    <?php if(auth()->guard()->check()): ?>
                    <h2 class="font-semibold text-m text-gray-800">
                        Owner: <?php echo e($upload->user->name); ?>

                    </h2>
                    <div class="relative flex lg:inline-flex items-center space-x-3">
                        <form method="POST" action='<?php echo e(url("/uploads/$upload->id/edit")); ?>' style="display: inline!important;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('get'); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => []]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>Edit <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </form>
                        <form method="POST" action='<?php echo e(url("/uploads/$upload->id")); ?>' style="display: inline!important;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => []]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>Delete <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </form>
                    </div>
                    <?php endif; ?>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>

            <?php if(session('operation')): ?>
            <?php echo e(session('operation')); ?> <?php echo e(session('id')); ?>

            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
            <p class="font-semibold">
                <a class="hover:underline"
                href='<?php echo e(url('/uploads/create')); ?>'>Add a file</a>
            </p>
            <?php if(isset($operation)): ?>
            <br>
            <?php echo e($operation); ?>

            <?php echo e($id); ?>

            <?php endif; ?>
            
            <?php endif; ?>
            <p class="font-semibold">
                <a class="hover:underline" href="<?php echo e(url('/')); ?>">Back to Blog</a>
            </p>
            <?php if(auth()->guard()->guest()): ?>
            <p class="font-semibold">
                <a href="<?php echo e(url('/register')); ?>" class="hover:underline">Register</a> or
                <a href="<?php echo e(url('/login')); ?>" class="hover:underline">Login</a> to add, update or delete an upload.
            </p>
            <?php endif; ?>
        </main>
    </section>
</body>
<?php /**PATH /home/ubuntu/blog1/resources/views/uploads/index.blade.php ENDPATH**/ ?>