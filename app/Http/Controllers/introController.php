<?php

namespace App\Http\Controllers;

use App\infoNegozio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;
use Mockery\Generator\Parameter;


class introController extends Controller
{

    public function index()
    {
        $user = User::first();
        if(!$test = infoNegozio::first()) {
            $parametri = new infoNegozio();
        }else{
            $parametri = $test;
        }
        return view('home',['user' => $user,'parametri' => $parametri]);
    }

    public function Negozio(){

        if(!$test = infoNegozio::first()) {
            $parametri = new infoNegozio();
        }else{
            $parametri = $test;
        }

        return view('parametri',['parametri' => $parametri]);
    }

    public function SalvaInfoNegozio(Request $request)
    {
        $rag_soc = $request->input('ragione_sociale');
        $piva = $request->input('PIva');
        $citta = $request->input('citta');
        $via = $request->input('via');
        $cap = $request->input('cap');
        $tipo = $request->input('tipo');

        $parametri = new infoNegozio();
        $parametri->rag_soc = $rag_soc;
        $parametri->piva = $piva;
        $parametri->citta = $citta;
        $parametri->via = $via;
        $parametri->cap = $cap;
        $parametri->tipo = $tipo;
        $parametri->save();
        $_SESSION['risposta'] = "Informazioni aggiornate";
        return redirect(route('index'));
    }

    public function updateInfoNegozio(Request $request)
    {
        $rag_soc = $request->input('ragione_sociale');
        $piva = $request->input('PIva');
        $citta = $request->input('citta');
        $via = $request->input('via');
        $cap = $request->input('cap');
        $tipo = $request->input('tipo');
        $infoNegozio = infoNegozio::first();
        $infoNegozio->rag_soc = $rag_soc;
        $infoNegozio->piva = $piva;
        $infoNegozio->citta = $citta;
        $infoNegozio->via = $via;
        $infoNegozio->cap = $cap;
        $infoNegozio->tipo = $tipo;
        $infoNegozio->update();
        $_SESSION['risposta'] = "Informazioni aggiornate";
        return redirect(route('index'));
    }
}
