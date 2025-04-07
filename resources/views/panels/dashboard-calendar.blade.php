<div class="card card-success" style="width: 100%;">
    <div class="card-header">
        <h3 class="card-title">Calendar</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div id="calendar" class="datepicker">

        </div>
    </div>
    <!-- /.card-body -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Kampania</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <!-- Zawartość modala -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('#calendar').datepicker();

    const campaigns = [{
            date: '2025-03-10', // format YYYY-MM-DD
            title: 'Kampania 1',
            description: 'Opis kampanii 1',
            author: 'Autor 1'
        },
        {
            date: '2025-03-11',
            title: 'Kampania 2',
            description: 'Opis kampanii 2',
            author: 'Autor 2'
        },
        {
            date: '2025-03-12',
            title: 'Kampania 3',
            description: 'Opis kampanii 3',
            author: 'Autor 3'
        }
    ];

    // Dodajemy kampanie do kalendarza
    // Funkcja, która będzie wywoływana przy każdej zmianie w kalendarzu
    function updateCalendar() {
        // Iterujemy przez kampanie i zaznaczamy odpowiednie dni w kalendarzu
        campaigns.forEach(function(campaign) {
            const campaignDate = new Date(campaign
                .date); // Konwertujemy datę kampanii na obiekt Date
            const timestamp = campaignDate.getTime(); // Pobieramy timestamp

            // Szukamy komórki w kalendarzu, której data odpowiada timestampowi kampanii
            $('#calendar .datepicker-days td[data-date="' + timestamp + '"]').addClass('marked');
        });
    }

    // Inicjalizowanie MutationObserver do śledzenia zmian w kalendarzu
    const observer = new MutationObserver(function(mutationsList, observer) {
        // Sprawdzamy, czy kalendarz został zmieniony
        mutationsList.forEach(function(mutation) {
            if (mutation.type === 'childList' || mutation.type === 'attributes') {
                // Jeśli zmienił się DOM (np. dodanie nowych elementów lub zmiana atrybutów), wywołaj updateCalendar
                updateCalendar();
            }
        });
    });

    // Opcje dla MutationObserver
    const config = {
        childList: true,
        subtree: true,
        attributes: true
    };

    // Obserwowanie elementu #calendar
    observer.observe(document.getElementById('calendar'), config);

    // Dodatkowa funkcja aktualizacji po załadowaniu strony (żeby początkowo dodać kampanie)
    updateCalendar();

    // Nasłuchujemy kliknięcia na daty
    $('#calendar').on('changeDate', function(event) {
        const clickedDate = formatDate(event.date);

        // Szukamy kampanii dla tej daty
        const selectedCampaigns = campaigns.filter(c => c.date === clickedDate);

        if (selectedCampaigns.length > 0) {
            // Jeśli są kampanie, otwieramy modal
            openModal(selectedCampaigns);
        }
    });
});

// Funkcja do formatowania daty w 'YYYY-MM-DD'
function formatDate(date) {
    const year = date.getFullYear();
    const month = ('0' + (date.getMonth() + 1)).slice(-2);
    const day = ('0' + date.getDate()).slice(-2);
    return `${year}-${month}-${day}`;
}

// Funkcja do otwierania modala z kampaniami
function openModal(campaigns) {
    let modalContent = '';

    // Budowanie treści modala
    campaigns.forEach(campaign => {
        modalContent += `
            <div class="campaign-modal">
                <h4>${campaign.title}</h4>
                <p>${campaign.description}</p>
                <small>Autor: ${campaign.author}</small>
            </div>
        `;
    });

    // Wyświetlanie treści w modal
    $('#modal-body').html(modalContent);

    // Otwieranie modala z użyciem jQuery (Bootstrap 4)
    $('#modal').modal('show');
}
</script>