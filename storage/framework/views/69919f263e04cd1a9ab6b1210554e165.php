<div>
    <?php if (isset($component)) { $__componentOriginal562cb1477a8769da678d472fe5deeba8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal562cb1477a8769da678d472fe5deeba8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-content','data' => ['pageName' => ''.e(__('site.users')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page-name' => ''.e(__('site.users')).'']); ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-user')): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.create-user', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2803782737-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-user')): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.update-user', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2803782737-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restore-user')): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.restore-user', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2803782737-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-user')): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.delete-user', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2803782737-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('bulk-delete-user')): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.bulk-delete-user', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2803782737-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('force-delete-user')): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.force-delete-user', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2803782737-5', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('force-bulk-delete-user')): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user.force-bulk-delete-user', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2803782737-6', $__slots ?? [], get_defined_vars());

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
                    <?php echo e(__('site.users')); ?>

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
                            <?php if (isset($component)) { $__componentOriginal5afb6b0a4c9c8b0ffeea03511314014b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5afb6b0a4c9c8b0ffeea03511314014b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.trash-group-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('trash-group-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5afb6b0a4c9c8b0ffeea03511314014b)): ?>
<?php $attributes = $__attributesOriginal5afb6b0a4c9c8b0ffeea03511314014b; ?>
<?php unset($__attributesOriginal5afb6b0a4c9c8b0ffeea03511314014b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5afb6b0a4c9c8b0ffeea03511314014b)): ?>
<?php $component = $__componentOriginal5afb6b0a4c9c8b0ffeea03511314014b; ?>
<?php unset($__componentOriginal5afb6b0a4c9c8b0ffeea03511314014b); ?>
<?php endif; ?>
                        </div>
                        <div class="mb-2">
                            <?php if (isset($component)) { $__componentOriginala6d15d77335de01bd81addac814f21ff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala6d15d77335de01bd81addac814f21ff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.create-button','data' => ['permission' => 'create-user']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('create-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['permission' => 'create-user']); ?>
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
                <!--[if BLOCK]><![endif]--><?php if($this->trash): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('force-bulk-delete-user')): ?>
                <?php if (isset($component)) { $__componentOriginal057a65c738b8fae1e968954f85c17432 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal057a65c738b8fae1e968954f85c17432 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.force-bulk-delete-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('force-bulk-delete-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal057a65c738b8fae1e968954f85c17432)): ?>
<?php $attributes = $__attributesOriginal057a65c738b8fae1e968954f85c17432; ?>
<?php unset($__attributesOriginal057a65c738b8fae1e968954f85c17432); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal057a65c738b8fae1e968954f85c17432)): ?>
<?php $component = $__componentOriginal057a65c738b8fae1e968954f85c17432; ?>
<?php unset($__componentOriginal057a65c738b8fae1e968954f85c17432); ?>
<?php endif; ?>
                <?php endif; ?>
                <?php else: ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('bulk-delete-user')): ?>
                <?php if (isset($component)) { $__componentOriginal6c52264334eecd11608d21550eaa588a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c52264334eecd11608d21550eaa588a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bulk-delete-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bulk-delete-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c52264334eecd11608d21550eaa588a)): ?>
<?php $attributes = $__attributesOriginal6c52264334eecd11608d21550eaa588a; ?>
<?php unset($__attributesOriginal6c52264334eecd11608d21550eaa588a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c52264334eecd11608d21550eaa588a)): ?>
<?php $component = $__componentOriginal6c52264334eecd11608d21550eaa588a; ?>
<?php unset($__componentOriginal6c52264334eecd11608d21550eaa588a); ?>
<?php endif; ?>
                <?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

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
                            <!--[if BLOCK]><![endif]--><?php if($this->trash): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('force-bulk-delete-user')): ?>
                            <td class="px-4 py-2 border">
                                <div class="text-center">
                                    <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:click' => 'checkboxAll','wire:model.live' => 'checkbox_status']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'checkboxAll','wire:model.live' => 'checkbox_status']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $attributes = $__attributesOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__attributesOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $component = $__componentOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__componentOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
                                </div>
                            </td>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('bulk-delete-user')): ?>
                            <td class="px-4 py-2 border">
                                <div class="text-center">
                                    <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:click' => 'checkboxAll','wire:model.live' => 'checkbox_status']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'checkboxAll','wire:model.live' => 'checkbox_status']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $attributes = $__attributesOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__attributesOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $component = $__componentOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__componentOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
                                </div>
                            </td>
                            <?php endif; ?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <td class="p-2 border">
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
                                    <button wire:click="sortByField('email')">
                                        <?php echo e(__('site.email')); ?>

                                    </button>
                                    <?php if (isset($component)) { $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sort-icon','data' => ['sortField' => 'email','sortBy' => $sort_by,'sortAsc' => $sort_asc]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sort-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sort_field' => 'email','sort_by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_by),'sort_asc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_asc)]); ?>
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
                                    <button wire:click="sortByField('national_number')">
                                        <?php echo e(__('site.national_number')); ?>

                                    </button>
                                    <?php if (isset($component)) { $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sort-icon','data' => ['sortField' => 'national_number','sortBy' => $sort_by,'sortAsc' => $sort_asc]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sort-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sort_field' => 'national_number','sort_by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_by),'sort_asc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_asc)]); ?>
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
                                    <button wire:click="sortByField('phone_number')">
                                        <?php echo e(__('site.phone_number')); ?>

                                    </button>
                                    <?php if (isset($component)) { $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sort-icon','data' => ['sortField' => 'phone_number','sortBy' => $sort_by,'sortAsc' => $sort_asc]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sort-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sort_field' => 'phone_number','sort_by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_by),'sort_asc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_asc)]); ?>
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
                                    <button wire:click="sortByField('department_id')">
                                        <?php echo e(__('site.department_id')); ?>

                                    </button>
                                    <?php if (isset($component)) { $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sort-icon','data' => ['sortField' => 'department_id','sortBy' => $sort_by,'sortAsc' => $sort_asc]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sort-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sort_field' => 'department_id','sort_by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_by),'sort_asc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_asc)]); ?>
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
                                    <button wire:click="sortByField('job_title_id')">
                                        <?php echo e(__('site.job_title_id')); ?>

                                    </button>
                                    <?php if (isset($component)) { $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sort-icon','data' => ['sortField' => 'job_title_id','sortBy' => $sort_by,'sortAsc' => $sort_asc]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sort-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sort_field' => 'job_title_id','sort_by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_by),'sort_asc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_asc)]); ?>
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
                                    <button wire:click="sortByField('responsibility_id')">
                                        <?php echo e(__('site.responsibility_id')); ?>

                                    </button>
                                    <?php if (isset($component)) { $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sort-icon','data' => ['sortField' => 'responsibility_id','sortBy' => $sort_by,'sortAsc' => $sort_asc]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sort-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sort_field' => 'responsibility_id','sort_by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_by),'sort_asc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_asc)]); ?>
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
                                    <button>
                                        <?php echo e(__('site.roles')); ?>

                                    </button>
                                    <?php if (isset($component)) { $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sort-icon','data' => ['sortField' => '','sortBy' => $sort_by,'sortAsc' => $sort_asc]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sort-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sort_field' => '','sort_by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_by),'sort_asc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_asc)]); ?>
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
                                    <button wire:click="sortByField('status')">
                                        <?php echo e(__('site.status')); ?>

                                    </button>
                                    <?php if (isset($component)) { $__componentOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee2a861ad7afb8a8513aaf5b4abcef1e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sort-icon','data' => ['sortField' => 'status','sortBy' => $sort_by,'sortAsc' => $sort_asc]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sort-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sort_field' => 'status','sort_by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_by),'sort_asc' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sort_asc)]); ?>
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
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr wire:key="user-<?php echo e($user->id); ?>" class="odd:bg-gray-100">
                            <!--[if BLOCK]><![endif]--><?php if($this->trash): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('force-bulk-delete-user')): ?>
                            <td class="p-2 border">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:model.live' => 'checkbox_arr','value' => ''.e($user->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'checkbox_arr','value' => ''.e($user->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $attributes = $__attributesOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__attributesOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $component = $__componentOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__componentOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
                            </td>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('bulk-delete-user')): ?>
                            <td class="p-2 border">
                                <?php if (isset($component)) { $__componentOriginal74b62b190a03153f11871f645315f4de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74b62b190a03153f11871f645315f4de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.checkbox','data' => ['wire:model.live' => 'checkbox_arr','value' => ''.e($user->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'checkbox_arr','value' => ''.e($user->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $attributes = $__attributesOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__attributesOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74b62b190a03153f11871f645315f4de)): ?>
<?php $component = $__componentOriginal74b62b190a03153f11871f645315f4de; ?>
<?php unset($__componentOriginal74b62b190a03153f11871f645315f4de); ?>
<?php endif; ?>
                            </td>
                            <?php endif; ?>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <td class="p-2 border">
                                <?php echo e($user->id); ?>

                            </td>
                            <td class="p-2 border">
                                <?php echo e($user->name); ?>

                            </td>
                            <td class="p-2 border">
                                <?php echo e($user->email); ?>

                            </td>
                            <td class="p-2 border">
                                <?php echo e($user->national_number); ?>

                            </td>
                            <td class="p-2 border">
                                <?php echo e($user->phone_number); ?>

                            </td>
                            <td class="p-2 border">
                                <span
                                    class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-1 px-2.5 py-0.5 rounded">
                                    <?php echo e($user->department?->name); ?>

                                </span>
                            </td>
                            <td class="p-2 border">
                                <span
                                    class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-1 px-2.5 py-0.5 rounded">
                                    <?php echo e($user->jobTitle?->name); ?>

                                </span>
                            </td>
                            <td class="p-2 border">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $user->responsibilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span
                                    class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-1 px-2.5 py-0.5 rounded">
                                    <?php echo e($res?->name); ?>

                                </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </td>
                            <td class="p-2 border">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span
                                    class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-1 px-2.5 py-0.5 rounded">
                                    <?php echo e($role); ?>

                                </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </td>
                            <td class="p-2 border">
                                <!--[if BLOCK]><![endif]--><?php if($user->status): ?>
                                <span class="p-2 bg-green-500 rounded-full text-white">
                                    <?php echo e(__('site.active')); ?>

                                </span>
                                <?php else: ?>
                                <span class="p-2 bg-red-500 rounded-full text-white">
                                    <?php echo e(__('site.not_active')); ?>

                                </span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </td>
                            <!--[if BLOCK]><![endif]--><?php if($this->trash): ?>
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <?php if (isset($component)) { $__componentOriginal8673fbfffc9980e28be6848c8f0f0b91 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8673fbfffc9980e28be6848c8f0f0b91 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.restore-button','data' => ['permission' => 'restore-user','id' => ''.e($user->id).'','name' => ''.e($user->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('restore-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['permission' => 'restore-user','id' => ''.e($user->id).'','name' => ''.e($user->name).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8673fbfffc9980e28be6848c8f0f0b91)): ?>
<?php $attributes = $__attributesOriginal8673fbfffc9980e28be6848c8f0f0b91; ?>
<?php unset($__attributesOriginal8673fbfffc9980e28be6848c8f0f0b91); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8673fbfffc9980e28be6848c8f0f0b91)): ?>
<?php $component = $__componentOriginal8673fbfffc9980e28be6848c8f0f0b91; ?>
<?php unset($__componentOriginal8673fbfffc9980e28be6848c8f0f0b91); ?>
<?php endif; ?>
                                    <div class="mx-1"></div>
                                    <?php if (isset($component)) { $__componentOriginalafbedbf045382560df5d0775a10bca6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalafbedbf045382560df5d0775a10bca6a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.force-delete-button','data' => ['permission' => 'force-delete-user','id' => ''.e($user->id).'','name' => ''.e($user->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('force-delete-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['permission' => 'force-delete-user','id' => ''.e($user->id).'','name' => ''.e($user->name).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalafbedbf045382560df5d0775a10bca6a)): ?>
<?php $attributes = $__attributesOriginalafbedbf045382560df5d0775a10bca6a; ?>
<?php unset($__attributesOriginalafbedbf045382560df5d0775a10bca6a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalafbedbf045382560df5d0775a10bca6a)): ?>
<?php $component = $__componentOriginalafbedbf045382560df5d0775a10bca6a; ?>
<?php unset($__componentOriginalafbedbf045382560df5d0775a10bca6a); ?>
<?php endif; ?>
                                </div>
                            </td>
                            <?php else: ?>
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <?php if (isset($component)) { $__componentOriginal8417baeedcb6c131165d53e37e61cc07 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8417baeedcb6c131165d53e37e61cc07 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.edit-button','data' => ['permission' => 'edit-user','id' => ''.e($user->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('edit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['permission' => 'edit-user','id' => ''.e($user->id).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete-button','data' => ['permission' => 'delete-user','id' => ''.e($user->id).'','name' => ''.e($user->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['permission' => 'delete-user','id' => ''.e($user->id).'','name' => ''.e($user->name).'']); ?>
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
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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

                <!--[if BLOCK]><![endif]--><?php if($users->hasPages()): ?>
                <?php if (isset($component)) { $__componentOriginalbef3dc49b19880cf96603fc512407156 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbef3dc49b19880cf96603fc512407156 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.paginate','data' => ['dataLinks' => $users->links()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('paginate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data-links' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users->links())]); ?>
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
</div><?php /**PATH /var/www/resources/views/livewire/user/list-user.blade.php ENDPATH**/ ?>