<div x-data="chartOrigin(@entangle('chartDataOrigin'), @entangle('relation'))" x-init="initChartOrigin()" class="grid grid-cols-1 place-items-center gap-6 mt-3"
    @chart-updated.window="chartData = $event.detail.chartData; renderChart();">

    <template x-if="isCanvasVisible">
        <canvas id="chartOriginId" width="600" height="400"></canvas>
    </template>

    <div class="flex justify-between mt-4">
        <x-select x-model="chartType" @change="updateChartType">
            <option value="doughnut">{{ __('site.doughnut') }}</option>
            <option value="bar">{{ __('site.bar') }}</option>
            <option value="line">{{ __('site.line') }}</option>
        </x-select>

        <div class="mx-1"></div>

        <x-select x-model="relation" @change="updateRelation">
            <option value="government">{{ __('site.government') }}</option>
            <option value="city">{{ __('site.city') }}</option>
            <option value="project">{{ __('site.project') }}</option>
        </x-select>
    </div>
</div>

@push('scripts')
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
@endpush
