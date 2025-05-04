<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['pageName']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['pageName']); ?>
<?php foreach (array_filter((['pageName']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div>
     <?php $__env->slot('title', null, []); ?> 
        <?php echo e($pageName); ?>

     <?php $__env->endSlot(); ?>

     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e($pageName); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="bg-gray-50 overflow-hidden shadow-xl md:p-8 py-6">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH /var/www/resources/views/components/page-content.blade.php ENDPATH**/ ?>