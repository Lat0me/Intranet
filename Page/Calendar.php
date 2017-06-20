<script type='text/javascript'>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            weekends: false,
            navLinks: true,
            editable: false,
            allDaySlot: true,
            minTime:"06:00:00",
            maxTime:"22:00:00",
            header: {
                left: 'prev,next today,agendaDay',
                center: 'title',
                right: 'listWeek,agendaWeek,month'
            },
            googleCalendarApiKey: 'AIzaSyDBBozrjQq4unlPIZILU5R3sPTMBlDihSI',
            eventSources: [
                {
                    googleCalendarId: 'd7uhj7j2qjd2qh1esqc725bn7k@group.calendar.google.com',
		    color: '#5CB85C',
                    className: 'gcal-event'
                },
                {
                    googleCalendarId: 'fr.french#holiday@group.v.calendar.google.com',
                    className: 'gcal-event'
                },
                {
                    url: '/Page/projetcal.php',
                    color: '#428BCA',
                    textColor: 'white'
                }
            ],
            eventColor: '#264a80'
        });
    });
</script>
<style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>

<div class="row">
    <div class="col-md-12">
        <div id='calendar'></div>
    </div>
</div>
