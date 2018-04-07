@include('tasks.default')

<a href="{{route("calendario.index")}}">Indietro</a>

<form style="margin-left: 60px" action="{{ route('calendario.store') }}" method="post">
    {{ csrf_field() }}
    Nome:
    <br />
    <input type="text" name="name" required />
    <br /><br />
    Trattamento:
    <br />
    <textarea required name="description"></textarea>
    <br /><br />
    Inizio:
    <br />
    <input type="text" id="task_date" name="task_date" class="date" value="{{$data[0]}}" required />
    <br /><br />
    Durata appuntamento (ore e minuti):
    <br />
    <select id="ore" name="ore" required>
        <option selected value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14" hidden>tutto</option>
        <option value="14">14</option>

    </select>
    <select id="minuti" name="minuti" required>
        <option selected value="0">0</option>
        <option value="30">30</option>
    </select>
    <br /><br />
    <input type="submit" value="Salva" />
</form>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $(window).on('load',function () {
        var data = $('#task_date').val();
        var giorno = data.substr(0,10);
        var ora = data.substr(11,5);
        if (ora == '00:04'){
            ora = '08:00';
            data = giorno+' '+ora;
            $('#task_date').val(data);
            $('#ore').val('14');
            $('#minuti').prop('disabled', true);
        }

    });

</script>