<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function show($id) {
        $project = Project::where('id', $id)->first();

        return view('project', ['project' => $project]);
    }

    public function create() {

    }
}
