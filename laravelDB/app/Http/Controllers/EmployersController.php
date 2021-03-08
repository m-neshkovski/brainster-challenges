<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Http\Requests\EmployerRequest;
use App\Mail\EmployerAccepted;
use Illuminate\Support\Facades\Mail;

class EmployersController extends Controller
{
    public function add(EmployerRequest $r) {
        
        $e = new Employer;
        $e->email = $r->vrabotiEmail;
        $e->phone = $r->vrabotiPhone;
        $e->company_name = $r->vrabotiCompany;
        
        // $employer = Employer::findOrFail($e->id);
        // dd($e);
        
        Mail::to($e->email)->send(new EmployerAccepted($e));
        $e->save();
        
        return redirect()->route('home', $r->session()->flash('poraka', true));
    }
}
