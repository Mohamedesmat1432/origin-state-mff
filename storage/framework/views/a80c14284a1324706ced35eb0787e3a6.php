<div x-data="chartOrigin(<?php if ((object) ('chartDataOrigin') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('chartDataOrigin'->value()); ?>')<?php echo e('chartDataOrigin'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('chartDataOrigin'); ?>')<?php endif; ?>, <?php if ((object) ('relation') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('relation'->value()); ?>')<?php echo e('relation'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('relation'); ?>')<?php endif; ?>)" x-init="initChartOrigin()" class="grid grid-cols-1 place-items-center gap-6 mt-3"
    @chart-updated.window="chartData = $event.detail.chartData; renderChart();">

    <template x-if="isCanvasVisible">
        <canvas id="chartOriginId" width="600" height="400"></canvas>
    </template>

    <div class="flex justify-between mt-4">
        <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['xModel' => 'chartType','@change' => 'updateChartType']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-model' => 'chartType','@change' => 'updateChartType']); ?>
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

        <div class="mx-1"></div>

        <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['xModel' => 'relation','@change' => 'updateRelation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-model' => 'relation','@change' => 'updateRelation']); ?>
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
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function chartOrigin(livewireData, livewireRelation) {
            return {
                chart: null,
                chartData: livewireData,
                relation: localStorage.getItem('relationOrigin') || livewireRelation,
                chartType: localStorage.getItem('chartTypeOrigin') || 'bar',
                isCanvasVisible: true, // Control visibility of canvas while rendering

                initChartOrigin() {
                    // Ensure the chart is rendered only when the canvas is available
                    this.renderChart();

                    // Watch for changes in chart data and re-render chart
                    this.$watch('chartData', () => {
                        this.renderChart();
                    });
                },

                renderChart() {
                    // Ensure the canvas element is visible before accessing it
                    this.isCanvasVisible = false; // Hide canvas before rendering
                    this.$nextTick(() => {
                        this.isCanvasVisible = true; // Re-show canvas after DOM is updated
                        this.$nextTick(() => {
                            const canvas = document.getElementById('chartOriginId');
                            if (!canvas) return; // If canvas is not found, return early
                            const ctx = canvas.getContext('2d');
                            if (!ctx) return; // If context is not available, return early

                            // Destroy the previous chart if it exists
                            if (this.chart) this.chart.destroy();

                            // Create new chart
                            this.chart = new Chart(ctx, {
                                type: this.chartType,
                                data: this.chartData,
                                options: {
                                    responsive: false,
                                    maintainAspectRatio: true,
                                    scales: {
                                        y: {
                                            beginAtZero: false
                                        }
                                    }
                                }
                            });
                        });
                    });
                },

                updateChartType() {
                    // Save chart type to localStorage and re-render chart
                    localStorage.setItem('chartTypeOrigin', this.chartType);
                    this.renderChart();
                },

                updateRelation() {
                    // Save relation to session and inform Livewire to update it
                    localStorage.setItem('relationOrigin', this.relation);
                    this.$wire.set('relation', this.relation);
                }
            };
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/resources/views/livewire/chart/origin-chart.blade.php ENDPATH**/ ?>