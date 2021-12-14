<?php $attributes = $attributes->exceptProps(['name']); ?>
<?php foreach (array_filter((['name']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="<?php echo e($name); ?>">
        <?php echo e(ucwords($name)); ?>

    </label>
    <input class="border border-gray-400 p-2 w-full" type="text" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" required <?php echo e($attributes(['value' => old($name)])); ?>>
    <?php $__errorArgs = [$name];
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
<?php /**PATH /home/ubuntu/blog1/resources/views/components/form/input.blade.php ENDPATH**/ ?>