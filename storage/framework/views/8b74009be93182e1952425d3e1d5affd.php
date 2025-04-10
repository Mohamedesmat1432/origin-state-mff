<div>
    <?php if (isset($component)) { $__componentOriginal562cb1477a8769da678d472fe5deeba8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal562cb1477a8769da678d472fe5deeba8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-content','data' => ['pageName' => ''.e(__('site.permissions')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page-name' => ''.e(__('site.permissions')).'']); ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-permission')): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('permission.create-permission', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-4241637663-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-permission')): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('permission.update-permission', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-4241637663-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-permission')): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('permission.delete-permission', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-4241637663-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    <?php echo e(__('site.permissions')); ?>

                </h1>
            </div>

            <div class="mt-6 text-gray-500 leading-relaxed">
                <div class="mt-3">
                    <div class="md:flex justify-between">
                        <div class="mb-2">
                            <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['type' => 'search','wire:model.live.debounce.500ms' => 'search','placeholder' => ''.e(__('site.search')).'...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'search','wire:model.live.debounce.500ms' => 'search','placeholder' => ''.e(__('site.search')).'...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                        </div>
                        <div class="mb-2">
                            <?php if (isset($component)) { $__componentOriginala6d15d77335de01bd81addac814f21ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6d15d77335de01bd81addac814f21ff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.create-button','data' => ['permission' => 'create-permission']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('create-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['permission' => 'create-permission']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala6d15d77335de01bd81addac814f21ff)): ?>
<?php $attributes = $__attributesOriginala6d15d77335de01bd81addac814f21ff; ?>
<?php unset($__attributesOriginala6d15d77335de01bd81addac814f21ff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6d15d77335de01bd81addac814f21ff)): ?>
<?php $component = $__componentOriginala6d15d77335de01bd81addac814f21ff; ?>
<?php unset($__componentOriginala6d15d77335de01bd81addac814f21ff); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('thead', null, []); ?> 
                        <tr>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('id')">
                                        <?php echo e(__('site.id')); ?>

                                    </button>
                                    <?php if (isset($component)) { $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sort-icon','data' => ['sortField' => 'id','sortBy' => $sort_by,'sortAsc' => $sort_asc]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sort-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sort_field' => 'id','sort_by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_by),'sort_asc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_asc)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e)): ?>
<?php $attributes = $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e; ?>
<?php unset($__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e)): ?>
<?php $component = $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e; ?>
<?php unset($__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e); ?>
<?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('name')">
                                        <?php echo e(__('site.name')); ?>

                                    </button>
                                    <?php if (isset($component)) { $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sort-icon','data' => ['sortField' => 'name','sortBy' => $sort_by,'sortAsc' => $sort_asc]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sort-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sort_field' => 'name','sort_by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_by),'sort_asc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_asc)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e)): ?>
<?php $attributes = $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e; ?>
<?php unset($__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e)): ?>
<?php $component = $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e; ?>
<?php unset($__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e); ?>
<?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <?php echo e(__('site.action')); ?>

                                </div>
                            </td>
                        </tr>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('tbody', null, []); ?> 
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr wire:key="permission-<?php echo e($permission->id); ?>" class="odd:bg-gray-100">
                                <td class="p-2 border">
                                    <?php echo e($permission->id); ?>

                                </td>
                                <td class="p-2 border">
                                    <?php echo e($permission->name); ?>

                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <?php if (isset($component)) { $__componentOriginal8417baeedcb6c131165d53e37e61cc07 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8417baeedcb6c131165d53e37e61cc07 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.edit-button','data' => ['permission' => 'edit-permission','id' => ''.e($permission->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('edit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['permission' => 'edit-permission','id' => ''.e($permission->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8417baeedcb6c131165d53e37e61cc07)): ?>
<?php $attributes = $__attributesOriginal8417baeedcb6c131165d53e37e61cc07; ?>
<?php unset($__attributesOriginal8417baeedcb6c131165d53e37e61cc07); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8417baeedcb6c131165d53e37e61cc07)): ?>
<?php $component = $__componentOriginal8417baeedcb6c131165d53e37e61cc07; ?>
<?php unset($__componentOriginal8417baeedcb6c131165d53e37e61cc07); ?>
<?php endif; ?>
                                        <div class="mx-1"></div>
                                        <?php if (isset($component)) { $__componentOriginalec2502b834f860c8e30d229aa8f280e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec2502b834f860c8e30d229aa8f280e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete-button','data' => ['permission' => 'delete-permission','id' => ''.e($permission->id).'','name' => ''.e($permission->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['permission' => 'delete-permission','id' => ''.e($permission->id).'','name' => ''.e($permission->name).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec2502b834f860c8e30d229aa8f280e2)): ?>
<?php $attributes = $__attributesOriginalec2502b834f860c8e30d229aa8f280e2; ?>
<?php unset($__attributesOriginalec2502b834f860c8e30d229aa8f280e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec2502b834f860c8e30d229aa8f280e2)): ?>
<?php $component = $__componentOriginalec2502b834f860c8e30d229aa8f280e2; ?>
<?php unset($__componentOriginalec2502b834f860c8e30d229aa8f280e2); ?>
<?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="12" class="p-2 border text-center">
                                    <?php echo e(__('site.no_data_found')); ?>

                                </td>
                            </tr>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>

                <!--[if BLOCK]><![endif]--><?php if($permissions->hasPages()): ?>
                    <?php if (isset($component)) { $__componentOriginalbef3dc49b19880cf96603fc512407156 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbef3dc49b19880cf96603fc512407156 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paginate','data' => ['dataLinks' => $permissions->links()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paginate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-links' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($permissions->links())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbef3dc49b19880cf96603fc512407156)): ?>
<?php $attributes = $__attributesOriginalbef3dc49b19880cf96603fc512407156; ?>
<?php unset($__attributesOriginalbef3dc49b19880cf96603fc512407156); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbef3dc49b19880cf96603fc512407156)): ?>
<?php $component = $__componentOriginalbef3dc49b19880cf96603fc512407156; ?>
<?php unset($__componentOriginalbef3dc49b19880cf96603fc512407156); ?>
<?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal562cb1477a8769da678d472fe5deeba8)): ?>
<?php $attributes = $__attributesOriginal562cb1477a8769da678d472fe5deeba8; ?>
<?php unset($__attributesOriginal562cb1477a8769da678d472fe5deeba8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal562cb1477a8769da678d472fe5deeba8)): ?>
<?php $component = $__componentOriginal562cb1477a8769da678d472fe5deeba8; ?>
<?php unset($__componentOriginal562cb1477a8769da678d472fe5deeba8); ?>
<?php endif; ?>
</div>
<?php /**PATH /var/www/resources/views/livewire/permission/list-permission.blade.php ENDPATH**/ ?>