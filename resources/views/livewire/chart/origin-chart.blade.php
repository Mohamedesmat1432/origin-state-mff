<div>
    <div x-data="chartOrigin" class="grid grid-cols-1 place-items-center gap-6 mt-3" wire:poll.10s="loadData">
        <canvas id="chartOriginId" x-init="initChartOrigin()"></canvas>
        <x-select x-model="chartType" @change="updateChartOriginType">
            <option value="doughnut">{{ __('site.doughnut') }}</option>
            <option value="bar">{{ __('site.bar') }}</option>
            <option value="line">{{ __('site.line') }}</option>
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
                            responsive: true,
                            maintainAspectRatio: true,
                            scales: {
                                y: {
                                    beginAtZero: true
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