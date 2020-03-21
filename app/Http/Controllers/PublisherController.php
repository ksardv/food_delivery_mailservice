<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Publisher\Publisher;

class PublisherController extends Controller
{
    private $publisher;

    public function index()
    {
        $this->publisher = new Publisher();
        $this->publisher->publish();
    }

    public function close()
    {
        $this->publisher->close();
    }
}
