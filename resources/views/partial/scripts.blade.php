<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pobranie ostatnich 6 miesięcy
        const months = [];
        const today = new Date();
        for (let i = 5; i >= 0; i--) {
            const date = new Date(today.getFullYear(), today.getMonth() - i, 1);
            months.push(date.toLocaleString('pl-PL', {
                month: 'long'
            })); // Nazwy miesięcy w języku polskim
        }

        // Dane dla nakładu zamówionego i wysłanego
        const dataOrdered = [120, 150, 180, 200, 170, 190]; // Nakład zamówiony
        const dataSent = [100, 130, 160, 190, 150, 180]; // Nakład wysłany

        // Pobranie kontekstu canvas
        const ctx = document.getElementById('barChart').getContext('2d');

        // Tworzenie wykresu
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months, // Ostatnie 6 miesięcy
                datasets: [{
                        label: 'Nakład Zamówiony',
                        backgroundColor: 'rgba(54, 162, 235, 0.6)', // Niebieski
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: dataOrdered
                    },
                    {
                        label: 'Nakład Wysłany',
                        backgroundColor: 'rgba(255, 99, 132, 0.6)', // Czerwony
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        data: dataSent
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Ilość sztuk'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    });
    </script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Nazwy krajów i wartości zrealizowanych zamówień
    const countries = ["Niemcy", "Francja", "Hiszpania", "Włochy", "Wielka Brytania"];
    const shipments = [320, 270, 190, 160, 140]; // Ilość zrealizowanych zamówień

    // Kolory dla wykresu
    const backgroundColors = [
        'rgba(255, 99, 132, 0.6)',  // Czerwony
        'rgba(54, 162, 235, 0.6)',  // Niebieski
        'rgba(255, 206, 86, 0.6)',  // Żółty
        'rgba(75, 192, 192, 0.6)',  // Zielony
        'rgba(153, 102, 255, 0.6)'  // Fioletowy
    ];

    // Pobranie kontekstu canvas
    const ctx = document.getElementById('pieChart').getContext('2d');

    // Tworzenie wykresu
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: countries, // Nazwy krajów
            datasets: [{
                label: 'Zrealizowane zamówienia',
                data: shipments, // Ilości zamówień
                backgroundColor: backgroundColors, // Kolory segmentów
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            let value = tooltipItem.raw;
                            return ` ${value} zamówień`;
                        }
                    }
                }
            }
        }
    });
});
</script>