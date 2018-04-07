@include('tasks.default')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <div id='calendar'></div>
    <form method="get" action="{{route('calendario.store')}}">
        <input type="hidden" name="dataOra">
    </form>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale/it.js'></script>

<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'agendaWeek',
            minTime: '08:00:00',
            maxTime: '22:00:00',
            // put your options and callbacks here
            dayClick: function (date,jsEvent, view) {
                window.location.href = "{{route('calendario.create')}}?data="+date.format('YYYY-MM-DD HH:MM');
            },
            events : [
                    @foreach($tasks as $task)
                {
                    title : '{{ $task->name }}',
                    start : '{{ $task->task_date }}',
                    end  : '{{ $task->task_date_fine }}',
                    url : '{{ route('calendario.edit', $task->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>
