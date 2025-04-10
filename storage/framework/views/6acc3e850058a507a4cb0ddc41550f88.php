<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id' => null, 'maxWidth' => null, 'submit' => null, 'method' => null]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id' => null, 'maxWidth' => null, 'submit' => null, 'method' => null]); ?>
<?php foreach (array_filter((['id' => null, 'maxWidth' => null, 'submit' => null, 'method' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['id' => $id,'maxWidth' => $maxWidth,'attributes' => $attributes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id),'maxWidth' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($maxWidth),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes)]); ?>
    <!--[if BLOCK]><![endif]--><?php if($submit): ?>
        <form wire:submit="<?php echo e($submit); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field($method); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <div class="px-6 py-4">
        <div class="text-2xl border-b-2 py-3 border-gray-100 font-medium text-gray-900">
            <?php echo e($title); ?>

        </div>

        <div class="text-sm text-gray-600">
            <?php echo e($content); ?>

        </div>
    </div>

    <div
        class="flex px-6 py-4 bg-gray-100 text-right">
        <?php echo e($footer); ?>

    </div>
    <!--[if BLOCK]><![endif]--><?php if($submit): ?>
        </form>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $attributes = $__attributesOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__attributesOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $component = $__componentOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__componentOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php /**PATH /var/www/resources/views/components/dialog-modal.blade.php ENDPATH**/ ?>