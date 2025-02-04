<!DOCTYPE html>
<html lang="<?php echo e(LaravelLocalization::getCurrentLocale()); ?>" dir="<?php echo e(LaravelLocalization::getCurrentLocaleDirection()); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/svg+xml" href="<?php echo e(asset('images/social_housing_logo.jpeg')); ?>">
    <title><?php echo e($title ?? 'Laravel'); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 500)">
        <div x-show="loading" class="fixed inset-0 flex items-center justify-center"
            style="background: rgba(129, 129, 129, 0.077)">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-t-blue-500 border-b-4 border-b-blue-500">
            </div>
        </div>
    </div>

    <div class="font-sans antialiased min-h-screen bg-gray-100 transition-all duration-500">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigate-menu', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2999907725-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <!-- Page Heading -->
        <?php if(isset($header)): ?>
        <header class="bg-white shadow border-b border-gray-100">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
                <div><?php echo e($header); ?></div>
            </div>
        </header>
        <?php endif; ?>

        <main>
            <?php if (isset($component)) { $__componentOriginal28174ed9fa6cdc4e8c05e1ad52ee0759 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal28174ed9fa6cdc4e8c05e1ad52ee0759 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.notify','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notify'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal28174ed9fa6cdc4e8c05e1ad52ee0759)): ?>
<?php $attributes = $__attributesOriginal28174ed9fa6cdc4e8c05e1ad52ee0759; ?>
<?php unset($__attributesOriginal28174ed9fa6cdc4e8c05e1ad52ee0759); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal28174ed9fa6cdc4e8c05e1ad52ee0759)): ?>
<?php $component = $__componentOriginal28174ed9fa6cdc4e8c05e1ad52ee0759; ?>
<?php unset($__componentOriginal28174ed9fa6cdc4e8c05e1ad52ee0759); ?>
<?php endif; ?>

            <?php echo e($slot); ?>

        </main>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


    <?php echo $__env->yieldPushContent('modals'); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH /var/www/resources/views/layouts/app.blade.php ENDPATH**/ ?>