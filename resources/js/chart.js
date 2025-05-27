import Chart from 'chart.js/auto';
window.Chart = Chart;

window.chartOrigin = (chartDataOrigin, groupBy) => ({
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
        clearTimeout(this.chartTypeTimeout);
        this.chartTypeTimeout = setTimeout(() => {
            localStorage.setItem('chartTypeOrigin', this.chartType);
            this.renderChart(); // only re-render, not full init
        }, 300);
    },

    updateGroupBy() {
        clearTimeout(this.groupByTimeout);
        this.groupByTimeout = setTimeout(() => {
            localStorage.setItem('groupByOrigin', this.groupBy);
            this.$wire.set('groupBy', this.groupBy);
        }, 300);
    },
}
);


window.chartUser = (chartDataUser) => ({
    chart: null,
    chartDataUser: chartDataUser,
    chartType: localStorage.getItem('chartTypeUser') || 'bar',
    initChartUser() {
        const ctx = document.getElementById('chartUserId').getContext('2d');

        // Ensure any existing chart is destroyed before creating a new one
        if (this.chart) {
            this.chart.destroy();
        }

        // Fetch data dynamically from Livewire (replace this with your actual data)
        const chartDataUser = this.chartDataUser;

        // Create a new Chart.js instance
        this.chart = new Chart(ctx, {
            type: this.chartType,
            data: chartDataUser,
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
    updateChartUserType() {
        localStorage.setItem('chartTypeUser', this.chartType);
        this.initChartUser();
    },
});