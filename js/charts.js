/* ========================================
   Subdivision Homeowner Record System
   Chart.js Configuration
   ======================================== */

// Chart data - Replace with dynamic data in PHP version
const chartData = {
    residentsPerBlock: {
        labels: ['Block A', 'Block B', 'Block C', 'Block D', 'Block E', 'Block F'],
        data: [45, 38, 52, 41, 33, 47]
    },
    houseOccupancy: {
        labels: ['Occupied', 'Vacant', 'Under Maintenance'],
        data: [78, 15, 7]
    },
    complaintStatus: {
        labels: ['Resolved', 'Pending', 'In Progress'],
        data: [42, 18, 12]
    }
};

// Common chart options
const commonOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: {
            position: 'bottom',
            labels: {
                padding: 20,
                usePointStyle: true,
                font: {
                    family: "'Inter', sans-serif",
                    size: 12
                }
            }
        }
    }
};

// Initialize charts when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initResidentsChart();
    initOccupancyChart();
    initComplaintsChart();
});

// Residents per Block - Bar Chart
function initResidentsChart() {
    const ctx = document.getElementById('residentsChart');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartData.residentsPerBlock.labels,
            datasets: [{
                label: 'Residents',
                data: chartData.residentsPerBlock.data,
                backgroundColor: '#2563EB',
                borderColor: '#1D4ED8',
                borderWidth: 1,
                borderRadius: 6,
                barThickness: 40
            }]
        },
        options: {
            ...commonOptions,
            plugins: {
                ...commonOptions.plugins,
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#E2E8F0'
                    },
                    ticks: {
                        font: {
                            family: "'Inter', sans-serif"
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            family: "'Inter', sans-serif"
                        }
                    }
                }
            }
        }
    });
}

// House Occupancy - Pie Chart
function initOccupancyChart() {
    const ctx = document.getElementById('occupancyChart');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: chartData.houseOccupancy.labels,
            datasets: [{
                data: chartData.houseOccupancy.data,
                backgroundColor: [
                    '#10B981',
                    '#EF4444',
                    '#F59E0B'
                ],
                borderColor: '#FFFFFF',
                borderWidth: 3
            }]
        },
        options: {
            ...commonOptions,
            plugins: {
                ...commonOptions.plugins,
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return `${context.label}: ${context.parsed} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}

// Complaint Status - Doughnut Chart
function initComplaintsChart() {
    const ctx = document.getElementById('complaintsChart');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: chartData.complaintStatus.labels,
            datasets: [{
                data: chartData.complaintStatus.data,
                backgroundColor: [
                    '#10B981',
                    '#EF4444',
                    '#2563EB'
                ],
                borderColor: '#FFFFFF',
                borderWidth: 3
            }]
        },
        options: {
            ...commonOptions,
            cutout: '60%',
            plugins: {
                ...commonOptions.plugins,
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return `${context.label}: ${context.parsed} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}

// Function to update charts with new data (for PHP integration)
function updateChartData(chartId, newLabels, newData) {
    const chart = Chart.getChart(chartId);
    if (chart) {
        chart.data.labels = newLabels;
        chart.data.datasets[0].data = newData;
        chart.update();
    }
}

