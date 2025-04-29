<div>
    <div x-data="chartOrigin" x-init="initChartOrigin()" x-on:chart-updated.window="initChartOrigin()"
        class="grid grid-cols-1 place-items-center gap-6 mt-3">
        <canvas id="chartOriginId" width="600" height="400"></canvas>
        <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['xModel' => 'chartType','@change' => 'updateChartOriginType']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-model' => 'chartType','@change' => 'updateChartOriginType']); ?>
            <option value="doughnut"><?php echo e(__('site.doughnut')); ?></option>
            <option value="bar"><?php echo e(__('site.bar')); ?></option>
            <option value="line"><?php echo e(__('site.line')); ?></option>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['wire:model.live' => 'relation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'relation']); ?>
            <option value="government"><?php echo e(__('site.government')); ?></option>
            <option value="city"><?php echo e(__('site.city')); ?></option>
            <option value="project"><?php echo e(__('site.project')); ?></option>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            function chartOrigin() {
                return {
                    chart: null,
                    chartType: localStorage.getItem('chartTypeOrigin') || 'bar',
                    initChartOrigin() {
                        const ctx = document.getElementById('chartOriginId').getContext('2d');

                        // Ensure any existing chart is destroyed before creating a new one
                        if (this.chart) {
                            this.chart.destroy();
                        }

                        // Fetch data dynamically from Livewire (replace this with your actual data)
                        const chartDataOrigin = <?php echo \Illuminate\Support\Js::from($chartDataOrigin)->toHtml() ?>;

                        // Create a new Chart.js instance
                        this.chart = new Chart(ctx, {
                            type: this.chartType,
                            data: chartDataOrigin,
                            options: {
                                responsive: false,
                                maintainAspectRatio: true,
                                scales: {
                                    y: {
                                        beginAtZero: false
                                    }
                                }
                            },

                        });
                    },
                    updateChartOriginType() {
                        localStorage.setItem('chartTypeOrigin', this.chartType);
                        this.initChartOrigin();
                    }
                };
            }
        </script>
    <?php $__env->stopPush(); ?>
</div>
<?php /**PATH /var/www/resources/views/livewire/chart/origin-chart.blade.php ENDPATH**/ ?>