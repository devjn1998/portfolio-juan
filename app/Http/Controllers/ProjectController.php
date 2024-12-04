<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }
}

