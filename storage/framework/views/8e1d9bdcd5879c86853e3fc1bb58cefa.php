<!--[if BLOCK]><![endif]--><?php if(count($this->checkbox_arr) > 0): ?>
    <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['wire:click' => '$dispatch(\'bulk-delete-modal\',{arr:\''.e(json_encode($this->checkbox_arr)).'\'})','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$dispatch(\'bulk-delete-modal\',{arr:\''.e(json_encode($this->checkbox_arr)).'\'})','wire:loading.attr' => 'disabled']); ?>
        <?php if (isset($component)) { $__componentOriginal9be913854797e04f92894da13b6df713 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9be913854797e04f92894da13b6df713 = $attributes; } ?>
<?php $component = WireUi\Heroicons\Icon::resolve(['name' => 'trash'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <?php echo e(__('site.delete_all')); ?> (<?php echo e(count($this->checkbox_arr)); ?>)
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $attributes = $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $component = $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH /var/www/resources/views/components/bulk-delete-button.blade.php ENDPATH**/ ?>