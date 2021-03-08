<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function show($id) {
        $project = Project::where('id', $id)->first();

        return view('project', ['project' => $project]);
    }

    public function store(ProjectRequest $request) {

        $project = new Project;
        $project->user_id = session()->get('id');
        $project->image_url = $request->image_url;
        $project->title = $request->title;
        $project->subtitle = $request->subtitle;
        $project->desc = $request->desc;

        $project->save();


        return redirect('/project/' . $project->id);
    }

    public function edit(ProjectRequest $request, $id) {

        $project = Project::where('id', $id)->first();

        $project->image_url = $request->image_url;
        $project->title = $request->title;
        $project->subtitle = $request->subtitle;
        $project->desc = $request->desc;

        $project->save();

        return redirect('/project/' . $project->id);
        
    }

    public function delete($id) {
        $project = Project::where('id', $id)->first();

        $project->delete();

        return redirect()->route('home');
    }
}
