<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('backend.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $validated_data = $request->validated();
        $validated_data['slug'] = Str::slug($validated_data['name'], '-');

        Technology::create($validated_data);

        return redirect()->route('technologies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('backend.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('backend.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $validated_data = $request->validated();
        $validated_data['slug'] = Str::slug($validated_data['name'], '-');

        $technology->update($validated_data);

        $technology->save();

        return redirect()->route('technologies.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->project()->sync([]);
        $technology->delete();
        return redirect()->route('technologies.index');
    }
}
