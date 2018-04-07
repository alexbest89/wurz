<?php

namespace App\Http\Controllers;

use App\infoNegozio;
use App\Task;
use App\User;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $parametri = infoNegozio::first();
        $tasks = Task::all();
        return view('tasks.index',['tasks'=>$tasks,'parametri'=>$parametri,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $data[] = $req->input('data');
        $user = User::all();
        $parametri = infoNegozio::first();
        $tasks = Task::all();
        return view('tasks.create',['tasks'=>$tasks,'parametri'=>$parametri,'user'=>$user,'data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $prova = $request->all();
        $data = new \DateTime($prova['task_date']);
        $flag = 0;
        $intero = 0;
        if($prova['ore']==14){
            $intero=1;
        }
        if($prova['ore']> 0) {
            $flag=1;
            $intervallo = new \DateInterval('PT' . $prova['ore'] . 'H');
            $data->add($intervallo);
        }
        if($intero != 1 and $prova['minuti'] > 0){
            $intervallo = new \DateInterval('PT'.$prova['minuti'].'M');
            $data->add($intervallo);
        } elseif($flag == 0) {
            $intervallo = new \DateInterval('PT30M');
            $data->add($intervallo);
        }
        $data = $data->format('Y-m-d H:i');
        $task->name = $prova['name'];
        $task->description = $prova['description'];
        $task->task_date = $prova['task_date'];
        $task->task_date_fine = $data;
        $task->ore = $prova['ore'];
        $task->save();
        return redirect()->route('calendario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::all();
        $parametri = infoNegozio::first();
        $tasks = Task::find($id);
        return view('tasks.update',['tasks'=>$tasks,'parametri'=>$parametri,'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prova = $request->all();
        if(($prova['ore']> 0) or ($prova['minuti'] > 0)){
            $data = new \DateTime($prova['task_date']);
            if($prova['ore']> 0) {
                $intervallo = new \DateInterval('PT' . $prova['ore'] . 'H');
                $data->add($intervallo);
            }
            if($prova['minuti'] > 0){
                $intervallo = new \DateInterval('PT'.$prova['minuti'].'M');
                $data->add($intervallo);
            }
        } else {
            $data = $prova['task_date_fine'];
        }
        $tasks = Task::find($id);
        $tasks->name = $prova['name'];
        $tasks->description = $prova['description'];
        $tasks->task_date = $prova['task_date'];
        $tasks->task_date_fine = $data;
        $tasks->ore = $prova['ore'];
        $tasks->save();
        return redirect()->route('calendario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->route('calendario.index');
    }
}
