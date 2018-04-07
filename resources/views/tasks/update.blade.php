@include('tasks.default')
<div style="margin-left: 60px">
<a href="{{route("calendario.index")}}">Indietro</a>

<form action="{{ route('calendario.update', $tasks->id) }}" method="post">
    {{ csrf_field()}}
    <input type="hidden" name="_method" value="PATCH">
    Nome:
    <br />
    <input type="text" name="name" value="{{$tasks->name}}" required />
    <br /><br />
    Trattamento:
    <br />
    <textarea name="description" required>{{$tasks->description}}</textarea>
    <br /><br />
    Inizio - Fine:
    <br />
    <input type="text" name="task_date" value="{{$tasks->task_date}}" required />
    <input type="text" name="task_date_fine" value="{{$tasks->task_date_fine}}" readonly>
    <br /><br />
    Durata appuntamento (ore e minuti):
    <br />
    <select name="ore" required>
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
        <option value="14">14</option>
    </select>
    <select name="minuti" required>
        <option selected value="0">0</option>
        <option value="30">30</option>
    </select>
    <br /><br />
    <input type="submit" value="Aggiorna" />
</form>
    <form action="{{ route('calendario.destroy', $tasks->id) }}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" class="btn btn-danger" id="cancella" value="Elimina">
    </form>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>