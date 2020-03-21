<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Worker\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        $consumer = new Worker();
        $consumer->consume();
    }
}
