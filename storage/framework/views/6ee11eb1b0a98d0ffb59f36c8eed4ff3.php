<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['sort_by', 'sort_asc', 'sort_field']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['sort_by', 'sort_asc', 'sort_field']); ?>
<?php foreach (array_filter((['sort_by', 'sort_asc', 'sort_field']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<!--[if BLOCK]><![endif]--><?php if($sort_by == $sort_field): ?>
    <!--[if BLOCK]><![endif]--><?php if($sort_asc): ?>
        <?php if (isset($component)) { $__componentOriginal9be913854797e04f92894da13b6df713 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9be913854797e04f92894da13b6df713 = $attributes; } ?>
<?php $component = WireUi\Heroicons\Icon::resolve(['name' => 'arrow-small-up'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\Heroicons\Icon::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9be913854797e04f92894da13b6df713)): ?>
<?php $attributes = $__attributesOriginal9be913854797e04f92894da13b6df713; ?>
<?php unset($__attributesOriginal9be913854797e04f92894da13b6df713); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9be913854797e04f92894da13b6df713)): ?>
<?php $component = $__componentOriginal9be913854797e04f92894da13b6df713; ?>
<?php unset($__componentOriginal9be913854797e04f92894da13b6df713); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if(!$sort_asc): ?>
        <?php if (isset($component)) { $__componentOriginal9be913854797e04f92894da13b6df713 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9be913854797e04f92894da13b6df713 = $attributes; } ?>
<?php $component = WireUi\Heroicons\Icon::resolve(['name' => 'arrow-small-down'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\Heroicons\Icon::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9be913854797e04f92894da13b6df713)): ?>
<?php $attributes = $__attributesOriginal9be913854797e04f92894da13b6df713; ?>
<?php unset($__attributesOriginal9be913854797e04f92894da13b6df713); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9be913854797e04f92894da13b6df713)): ?>
<?php $component = $__componentOriginal9be913854797e04f92894da13b6df713; ?>
<?php unset($__componentOriginal9be913854797e04f92894da13b6df713); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH /var/www/resources/views/components/sort-icon.blade.php ENDPATH**/ ?>