<?php if(auth()->guard()->check()): ?>
    <form method="POST" action="<?php echo e(url('/posts')); ?>/<?php echo e($post->slug); ?>/comments" class="border border gray-200 p-6 rounded-xl">
        <?php echo csrf_field(); ?>
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u=<?php echo e(auth()->id()); ?>" alt="" width="40" height="40" class="rounded-full">
            <h2 class="ml-4">Want to say something about this post?</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                placeholder="Add your comment here..."></textarea>
            <?php $__errorArgs = ['body'];
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
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => []]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>Post <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        </div>
    </form>
<?php else: ?>
    <p class="font-semibold">
        <a href="<?php echo e(url('/register')); ?>" class="hover:underline">Register</a> or
        <a href="<?php echo e(url('/login')); ?>" class="hover:underline">Login</a> to leave a comment.
    </p>
<?php endif; ?>
<?php /**PATH /home/ubuntu/blog1/resources/views/posts/_add-comment-form.blade.php ENDPATH**/ ?>