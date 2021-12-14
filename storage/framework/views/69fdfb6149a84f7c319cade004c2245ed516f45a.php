<!doctype html>

<title>Boryana's Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="<?php echo e(url('/uploads')); ?>" class="ml-6 text-xs font-bold uppercase">Uploads</a>
            </div>
            <div class="mt-8 md:mt-0">
                <a href="<?php echo e(url('/')); ?>" class="text-xs font-bold uppercase">Home Page</a>
            </div>
        </nav>
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <section class="px-6 py-8">
                <div class="border border-gray-200 p-6 rounded-xl max-w-sm mx-auto">

                    <form method="POST" action="<?php echo e(url('/uploads')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="upload">
                                File
                            </label>
                            <input class="border border-gray-400 p-2 w-full" type="file" name="upload" id="upload" value="<?php echo e(old('upload')); ?>" required>
                            <?php $__errorArgs = ['upload'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                                Title
                            </label>
                            <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="<?php echo e(old('title')); ?>" required>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="content">
                                Content
                            </label>
                            <textarea class="border border-gray-400 p-2 w-full" name="content" id="content" required><?php echo e(old('content')); ?></textarea>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => []]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>Submit Upload <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                </div>
                </form>
                <br />
                <a href="<?php echo e(url('/uploads')); ?>" class="text-xs font-bold uppercase">Back to Uploads</a>
                </div>
            </section>
        </main>
    </section>
</body>
</html>

<?php if(!empty($id)): ?>
<br>
<a class="text-xs font-bold uppercase" href="<?php echo e(url('/uploads', [$id, 'file', $originalName])); ?>"><?php echo e($id); ?>

    <?php echo e($originalName); ?></a>
<br>
<?php if(substr($mimeType, 0, 5) == 'image'): ?>
<img height="25%" width="25%" src="<?php echo e(url('/uploads', [$id, $originalName])); ?>">
<br>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/ubuntu/blog1/resources/views/uploads/create.blade.php ENDPATH**/ ?>