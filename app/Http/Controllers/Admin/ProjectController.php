<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        
        return view('backend.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('backend.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated_data = $request->validated();
        $validated_data['slug'] = Str::slug($validated_data['name'] ,'-');
        
        if(key_exists('proj_thumb' ,$validated_data)){
            $img_path = Storage::disk('public')->put('proj_images', $validated_data['proj_thumb']);
            $validated_data['proj_thumb'] = $img_path;
        }

        Project::create($validated_data);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('backend.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        return view('backend.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated_data = $request->validated();
        $validated_data['slug'] = Str::slug($validated_data['name'] ,'-');

        if(key_exists('proj_thumb', $validated_data)){

            if($project->proj_thumb){
                Storage::delete($project->proj_thumb);
            }

            $img_path = Storage::disk('public')->put('proj_images', $validated_data['proj_thumb']);
            $validated_data['proj_thumb'] = $img_path;
        }

        if(key_exists('thumb_remove', $request->all()) && $request->thumb_remove == 1 ){
            Storage::delete($project->proj_thumb);
            $validated_data['proj_thumb'] = null;
        }

        $project->update($validated_data);
        $project->save();
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if($project->proj_thumb){
            Storage::delete($project->proj_thumb);
        }

        $project->delete();
        return redirect()->route('projects.index');
    }
}
