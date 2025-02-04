<div x-on:click="langMenu = ! langMenu" x-data="{ langMenu: false }" x-on:click.away="langMenu = false" x-on:close.stop="langMenu = false"
    class="relative cursor-pointer mx-4 justify-center inline-flex items-center px-1 pt-1 hover:border-b-2 hover:border-gray-300 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-blue-700">
    <!-- Dropdown toggle button -->
    <span class="flex text-gray-500 hover:text-gray-700">
        <?php if (isset($component)) { $__componentOriginal9be913854797e04f92894da13b6df713 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9be913854797e04f92894da13b6df713 = $attributes; } ?>
<?php $component = WireUi\Heroicons\Icon::resolve(['name' => 'language'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <span><?php echo e(__('site.lang')); ?> </span>
    </span>
    <!-- Dropdown list -->
    <div x-show="langMenu" class="absolute z-50 rtl:right-0 ltr:left-0 top-10 py-2 mt-5 rounded-md shadow-xl w-36 bg-white">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="flex justify-between px-4 py-2 text-sm hover:bg-blue-400 hover:text-white <?php echo e($localeCode === LaravelLocalization::getCurrentLocale() ? 'bg-blue-500 text-white font-bold' : ''); ?>"
                rel="alternate" hreflang="<?php echo e($localeCode); ?>"
                href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                <span><?php echo e($properties['native']); ?></span>
                <img src="<?php echo e(asset('images/' . $localeCode . '.jpg')); ?>" alt="<?php echo e($localeCode); ?>" class="w-6 h-6" />
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH /var/www/resources/views/components/lang-dropdwon.blade.php ENDPATH**/ ?>