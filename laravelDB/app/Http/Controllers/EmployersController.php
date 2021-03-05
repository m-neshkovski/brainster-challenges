<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployerRequest;
use App\Models\Employer;

class EmployersController extends Controller
{
    public function add(EmployerRequest $r) {
        
        $e = new Employer;
        $e->email = $r->vrabotiEmail;
        $e->phone = $r->vrabotiPhone;
        $e->company_name = $r->vrabotiCompany;
        $e->save();

        return redirect(route('home', ['poraka' => true]));
    }
}
