<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['active']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['active']); ?>
<?php foreach (array_filter((['active']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $classes = $active ?? false ? 'block w-full px-4 py-2 text-' . __('site.left') . ' text-sm leading-5 border-l-2 border-blue-400 bg-blue-100 focus:outline-none focus:bg-blue-100 transition duration-150 ease-in-out' : 'block w-full px-4 py-2 text-' . __('site.left'). ' text-sm leading-5 text-gray-700 hover:bg-blue-50 focus:outline-none focus:bg-blue-100 transition duration-150 ease-in-out';
?>

<a <?php echo e($attributes->merge(['class' => $classes])); ?>>
    <?php echo e($slot); ?>

</a>
<?php /**PATH /var/www/resources/views/components/dropdown-link.blade.php ENDPATH**/ ?>