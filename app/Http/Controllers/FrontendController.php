<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot;
use App\Models\Task;
use App\Models\User;


class FrontendController extends Controller
{
    public function index()
    {
        $lots=Lot::get();
        $lot_tasks = Lot::with('tasks', 'tasks.user')->get();
        $tasks=Task::get();
        $jobbers=User::get();
        return view('frontend.index')
                ->with('lots',$lots)
                ->with('lot_tasks',$lot_tasks)
                ->with('tasks',$tasks)
                ->with('jobbers',$jobbers);

    }
}
