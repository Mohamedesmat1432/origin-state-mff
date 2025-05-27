<div  x-data="chartOrigin(@entangle('chartDataOrigin'), @entangle('groupBy'))" 
    x-init="initChartOrigin()"
    class="grid grid-cols-1 place-items-center gap-6 mt-3"
    @chart-updated.window="chartData = $event.detail.chartData; renderChart();">

    <canvas id="chartOriginId" width="600" height="400"></canvas>

    <div class="flex justify-between mt-4">
        <x-select x-model="chartType" @change.debounce.300ms="updateChartType">
            <option value="doughnut">{{ __('site.doughnut') }}</option>
            <option value="bar">{{ __('site.bar') }}</option>
            <option value="line">{{ __('site.line') }}</option>
        </x-select>

        <div class="mx-1"></div>

        <x-select x-model="groupBy" @change.debounce.300ms="updateGroupBy">
            <option value="government">{{ __('site.government') }}</option>
            <option value="city">{{ __('site.city') }}</option>
            <option value="project">{{ __('site.project') }}</option>
            <option value="decisionType">{{ __('site.decisionType') }}</option>
            <option value="createdBy">{{ __('site.created_by') }}</option>
            <option value="revisedBy">{{ __('site.revised_by') }}</option>
            <option value="completedBy">{{ __('site.completed_by') }}</option>
        </x-select>
    </div>
</div>

{{-- @push('scripts')
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
                                    responsive: false,  // Allow the chart to resize responsively
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
@endpush --}}
