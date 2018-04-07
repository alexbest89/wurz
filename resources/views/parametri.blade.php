@include('template.default')
<div class="container">
    <h1>WURZ</h1>

    <h3>Personalizza la tua applicazione web:</h3>

    @if(!$parametri->rag_soc)
        <form action="{{route('SalvaInfoNegozio')}}">
    @else
        <form action="{{route('updateInfoNegozio')}}">
    @endif
            <div class="form-group row">
                <label for="ragione_sociale" class="col-sm-3 col-form-label text-md-right">Ragione Sociale</label>
                <div class="col-md-3">
                    <input name="ragione_sociale" class="form-control" placeholder="Ragione Sociale" value="{{$parametri->rag_soc}}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="PIva" class="col-sm-3 col-form-label text-md-right">Partita Iva</label>
                <div class="col-md-3">
                    <input name="PIva" class="form-control" placeholder="Partita Iva" value="{{$parametri->piva}}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="citta" class="col-sm-3 col-form-label text-md-right">citta</label>
                <div class="col-md-3">
                    <input name="citta" class="form-control" placeholder="Città" value="{{$parametri->citta}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="via" class="col-sm-3 col-form-label text-md-right">Via</label>
                <div class="col-md-3">
                    <input name="via" class="form-control" placeholder="Via" value="{{$parametri->via}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="cap" class="col-sm-3 col-form-label text-md-right">Cap</label>
                <div class="col-md-3">
                    <input name="cap" class="form-control" placeholder="CAP" value="{{$parametri->cap}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="tipo" class="col-sm-3 col-form-label text-md-right">Tipo</label>
                <div class="col-md-3">
                    <input name="tipo" class="form-control" placeholder="Tipo" value="{{$parametri->tipo}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Salva</button>
                </div>
            </div>
        </form>
        </form>
</div>
