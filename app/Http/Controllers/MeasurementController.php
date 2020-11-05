<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;

class MeasurementController extends Controller
{
    public function index()
    {
        $measurements = Measurement::all();

        return $measurements;
    }
}
