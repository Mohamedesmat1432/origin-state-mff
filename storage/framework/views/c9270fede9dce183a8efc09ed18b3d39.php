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

</head>

<body>
    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 500)">
        <div x-show="loading" class="fixed inset-0 flex items-center justify-center"
            style="background: rgba(129, 129, 129, 0.077)">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-t-blue-500 border-b-4 border-b-blue-500"></div>
        </div>
    </div>
    <div class="font-sans text-gray-900 antialiased">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('home-menu', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-674285804-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <main>
            <?php echo e($slot); ?>

        </main>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>

</html><?php /**PATH /var/www/resources/views/layouts/guest.blade.php ENDPATH**/ ?>