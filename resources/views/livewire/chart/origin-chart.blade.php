<div>
    <div x-data="chartOrigin" x-init="initChartOrigin()" x-on:chart-updated.window="initChartOrigin()"
        class="grid grid-cols-1 place-items-center gap-6 mt-3">
        <canvas id="chartOriginId" width="600" height="400"></canvas>
        <x-select x-model="chartType" @change="updateChartOriginType">
            <option value="doughnut">{{ __('site.doughnut') }}</option>
            <option value="bar">{{ __('site.bar') }}</option>
            <option value="line">{{ __('site.line') }}</option>
        </x-select>
        <x-select wire:model.live="relation">
            <option value="government">{{ __('site.government') }}</option>
            <option value="city">{{ __('site.city') }}</option>
            <option value="project">{{ __('site.project') }}</option>
        </x-select>
    </div>

    @push('scripts')
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
                        const chartDataOrigin = @js($chartDataOrigin);

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
    @endpush
</div>
