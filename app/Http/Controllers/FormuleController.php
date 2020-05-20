<?php

namespace App\Http\Controllers;

use App\Models\Formule;
use Illuminate\Http\Request;

class FormuleController extends Controller
{
    public function list()
    {
        return view('formule.formules', ['formules' => Formule::all()]);
    }
}
