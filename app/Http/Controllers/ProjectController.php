<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get Project List
     *
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * View project creation
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store Project
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->validated();

        $data['target'] = json_encode(array_key_exists('target', $data) ? ($data['target'] ? $data['target'] : []) : []);

        if ($request->hasFile('buildup_file')) {
            $url = Storage::put('buildups', $request->file('buildup_file'));
            $data['buildup_file'] = $url;
        }

        if ($request->hasFile('design_file')) {
            $url = Storage::put('designs', $request->file('design_file'));
            $data['design_file'] = $url;
        }

        $project = Project::create($data);

        return redirect()->route('home')->withSuccess('Successfully created new project');

    }
}
