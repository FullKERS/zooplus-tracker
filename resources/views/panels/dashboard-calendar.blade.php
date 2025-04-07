<div class="card card-success" style="width: 100%;">
    <div class="card-header">
        <h3 class="card-title"><i class="fa-solid fa-calendar"></i> Calendar</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-dismiss="modal">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div id="calendar" class="datepicker"></div>

        <!-- Upcoming Events Section -->
        <div class="mt-4">
            <h4 class="mb-3"><i class="fas fa-calendar-alt mr-2"></i>Upcoming Events</h4>
            <div id="upcoming-events" class="list-group">
                <div class="text-center text-muted py-3">Loading events...</div>
            </div>
        </div>
    </div>
</div>

<!-- Events Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white"><i class="fas fa-calendar-day mr-2"></i>Events</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="events-list" class="mb-4"></div>
                <hr>
                <h5 class="mb-3"><i class="fas fa-plus-circle mr-2"></i>Add New Event</h5>
                <form id="entryForm">
                    <input type="hidden" id="entryDate">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    let refreshInterval = null;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const BASE_URL = '{{ url("/") }}';
    const calendar = $('#calendar').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        beforeShowDay: function(date) {
            // Generuj timestamp w UTC dla północy
            const utcTimestamp = Date.UTC(
                date.getUTCFullYear(),
                date.getUTCMonth(),
                date.getUTCDate()
            );

            return {
                content: date.getDate(),
                attributes: {
                    'data-date': utcTimestamp
                }
            };
        }
    });

    // Initialize auto-refresh
    function startAutoRefresh() {
        if (!refreshInterval) {
            refreshInterval = setInterval(() => {
                loadUpcomingEvents();
                updateCalendarStyles();
            }, 10000);
        }
    }

    // Stop auto-refresh when modal is closed
    $('#eventModal').on('hidden.bs.modal', function() {
        if (refreshInterval) {
            clearInterval(refreshInterval);
            refreshInterval = null;
        }
    });

    // Date click handler
    calendar.on('changeDate', function(e) {
        const date = e.date.toISOString().split('T')[0];
        $('#entryDate').val(date);
        loadDateEvents(date);
        $('#eventModal').modal('show');
        startAutoRefresh();
    });

    // Form submit handler
    $('#entryForm').submit(function(e) {
        e.preventDefault();
        const formData = {
            date: $('#entryDate').val(),
            title: $('input[name="title"]').val(),
            description: $('textarea[name="description"]').val() || '' // Prevent null
        };

        $.ajax({
            url: `${BASE_URL}/calendar-entries`,
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#entryForm').trigger('reset');
                loadDateEvents(formData.date);
                loadUpcomingEvents();
                updateCalendarStyles();
            }
        });
    });

    // Load events for selected date

    function loadDateEvents(date) {
        $.get(`${BASE_URL}/calendar-entries/by-date/${date}`, function(response) {
            // Walidacja odpowiedzi
            const entries = Array.isArray(response) ? response : [];

            const html = entries.length ? entries.map(entry => `
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title text-primary">${entry.title || 'No title'}</h5>
                                ${entry.description ? `<p class="card-text">${entry.description}</p>` : ''}
                                <small class="text-muted">
                                    ${new Date(entry.date).toLocaleDateString('en-US', { 
                                        weekday: 'long', 
                                        year: 'numeric', 
                                        month: 'long', 
                                        day: 'numeric' 
                                    })}
                                </small>
                            </div>
                            <button class="btn btn-sm btn-danger delete-entry" data-id="${entry.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('') : '<p class="text-muted">No events for selected date</p>';

            $('#events-list').html(html);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error('Error loading date events:', textStatus, errorThrown);
            $('#events-list').html(
                '<div class="alert alert-danger">Error loading events for this date.</div>'
            );
        });
    }

    // Load upcoming events

    function loadUpcomingEvents() {
        $.get(`${BASE_URL}/calendar-entries`, function(response) {
            const entries = Array.isArray(response) ? response : [];

            const html = entries.length ? entries.map(entry => `
            <div class="upcoming-event-item bg-white">
                <div class="d-flex align-items-center">
                    <div class="event-icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="flex-fill">
                        <div class="event-title">${entry.title || 'No title'}</div>
                        ${entry.description ? `<div class="event-description">${entry.description}</div>` : ''}
                        <div class="event-date">
                            ${new Date(entry.date).toLocaleDateString('en-US', { 
                                weekday: 'short', 
                                month: 'short', 
                                day: 'numeric' 
                            })}
                        </div>
                    </div>
                    <button class="btn btn-danger delete-btn delete-entry" data-id="${entry.id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `).join('') : '<div class="text-center text-muted py-2">No upcoming events</div>';

            $('#upcoming-events').html(html);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            $('#upcoming-events').html(
                '<div class="alert alert-danger py-2">Error loading events</div>'
            );
        });
    }


    // Delete event handler
    $(document).on('click', '.delete-entry', function() {
        const entryId = $(this).data('id');
        if (confirm('Are you sure you want to delete this event?')) {
            $.ajax({
                url: `${BASE_URL}/calendar-entries/${entryId}`,
                method: 'DELETE',
                success: function() {
                    loadUpcomingEvents();
                    updateCalendarStyles();
                    $('#eventModal').modal('hide');
                }
            });
        }
    });

    // Update calendar highlights
    function updateCalendarStyles() {
        // Pobierz nowe dane PRZED usuwaniem klas
        $.get(`${BASE_URL}/calendar-entries`, function(response) {
            const entries = Array.isArray(response) ? response : [];
            const activeDates = new Set();

            // Zbierz nowe daty
            entries.forEach(entry => {
                try {
                    const date = new Date(entry.date);
                    date.setUTCHours(0, 0, 0, 0);
                    activeDates.add(date.getTime());
                } catch (e) {
                    console.error('Invalid date:', entry.date);
                }
            });

            // Aktualizuj klasy w jednym przebiegu
            $('.datepicker td.day').each(function() {
                const timestamp = parseInt($(this).data('date'), 10);
                $(this).toggleClass('has-event', activeDates.has(timestamp));
            });
        });
    }

    // Initial setup
    loadUpcomingEvents();
    updateCalendarStyles();
    startAutoRefresh();
});
</script>

<style>
.datepicker td {
    transition: all 0.15s ease-out;
}

.datepicker td.has-event {
    will-change: transform, background-color;
}

.upcoming-event-item {
    padding: 0.5rem 1rem;
    margin-bottom: 0.5rem;
    border-radius: 4px;
    transition: all 0.2s ease;
    border: 1px solid rgba(0, 0, 0, 0.1);
}

.upcoming-event-item:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.event-title {
    font-size: 0.95rem;
    font-weight: 500;
    margin-bottom: 0.25rem;
}

.event-description {
    font-size: 0.85rem;
    color: #6c757d;
    line-height: 1.3;
}

.event-date {
    font-size: 0.75rem;
    color: #868e96;
}

.event-icon {
    font-size: 1rem;
    margin-right: 0.75rem;
    color: #4dabf7;
}

.delete-btn {
    padding: 0.25rem 0.4rem;
    font-size: 0.8rem;
    margin-left: 0.5rem;
}


.datepicker td.has-event {
    position: relative;
    background: #e3f2fd;
    border: 2px solid #2196F3 !important;
    border-radius: 4px;
}

.datepicker td.has-event .day {
    font-weight: bold;
    color: #0d47a1;
}

.datepicker td.has-event:after {
    content: '';
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 6px;
    height: 6px;
    background: #2196F3;
    border-radius: 50%;
}

.datepicker td.has-event:hover:after {
    background: #0d47a1;
}
</style>