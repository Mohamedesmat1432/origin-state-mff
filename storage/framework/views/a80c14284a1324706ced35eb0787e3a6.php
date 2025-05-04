<div  x-data="chartOrigin(<?php if ((object) ('chartDataOrigin') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('chartDataOrigin'->value()); ?>')<?php echo e('chartDataOrigin'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('chartDataOrigin'); ?>')<?php endif; ?>, <?php if ((object) ('groupBy') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('groupBy'->value()); ?>')<?php echo e('groupBy'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('groupBy'); ?>')<?php endif; ?>)" 
    x-init="initChartOrigin()"
    class="grid grid-cols-1 place-items-center gap-6 mt-3"
    @chart-updated.window="chartData = $event.detail.chartData; renderChart();">

    <canvas id="chartOriginId" width="600" height="400"></canvas>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['xModel' => 'groupBy','@change' => 'updateGroupBy']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-model' => 'groupBy','@change' => 'updateGroupBy']); ?>
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
    function chartOrigin(chartDataOrigin, groupBy) {
        return {
            chart: null,
            chartData: chartDataOrigin,
            groupBy: groupBy,
            chartType: localStorage.getItem('chartTypeOrigin') || 'bar',
            isCanvasVisible: true,

            initChartOrigin() {
                this.renderChart();

                // Watch for changes in chart data and re-render chart
                this.$watch('chartData', () => {
                    this.renderChart();
                });

                this.$watch('groupBy', () => {
                    this.renderChart();
                });
            },

            renderChart() {
                // Hide the canvas before rendering
                this.isCanvasVisible = false; 
                
                // Ensure the canvas element and context are available before proceeding
                this.$nextTick(() => {
                    // Wait for the next DOM update and check canvas visibility
                    this.isCanvasVisible = true;
                    this.$nextTick(() => {
                        const canvas = document.getElementById('chartOriginId');
                        if (!canvas) {
                            console.error("Canvas not found!");
                            return; // Return if canvas is not found
                        }

                        const ctx = canvas.getContext('2d');
                        if (!ctx) {
                            console.error("Canvas context not available!");
                            return; // Return if context is not available
                        }

                        // If a chart already exists, destroy it before creating a new one
                        if (this.chart) {
                            this.chart.destroy();
                        }

                        try {
                            // Create a new chart with the current data
                            this.chart = new Chart(ctx, {
                                type: this.chartType,  // Use the current chart type (e.g., doughnut, bar, line)
                                data: this.chartData,  // Use the current chart data
                                options: {
                                    responsive: true,  // Allow the chart to resize responsively
                                    maintainAspectRatio: true,  // Maintain aspect ratio
                                    animation: {
                                        duration: 0, // Disable animations for better performance and stability
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: false, // Control if the Y-axis starts from 0
                                        }
                                    }
                                }
                            });
                        } catch (error) {
                            console.error("Error creating chart:", error);
                        }
                    });
                });
            },

            updateChartType() {
                // Prevent multiple rapid updates by debouncing
                clearTimeout(this.updateTimeout);
                this.updateTimeout = setTimeout(() => {
                    // Save the selected chart type to localStorage and trigger re-render
                    localStorage.setItem('chartTypeOrigin', this.chartType);
                    this.initChartOrigin();
                }, 200); // Debounce for 200ms
            },

            updateGroupBy() {
                // Prevent multiple rapid updates by debouncing
                clearTimeout(this.updateTimeout);
                this.updateTimeout = setTimeout(() => {
                    // Save the selected groupBy to session and inform Livewire to update it
                    localStorage.setItem('groupByOrigin', this.groupBy);
                    this.$wire.set('groupBy', this.groupBy);
                    this.initChartOrigin();
                }, 200); // Debounce for 200ms
            }
        };
    }
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/resources/views/livewire/chart/origin-chart.blade.php ENDPATH**/ ?>