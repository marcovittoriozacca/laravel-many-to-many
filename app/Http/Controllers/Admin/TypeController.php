<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types =  Type::all();

        return view('backend.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($val_data['name'], '-');

        Type::create($val_data);

        return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('backend.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('backend.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $val_data = $request->validated();
        
        $val_data['slug'] = Str::slug($val_data['name'] ,'-');

        $type->update($val_data);

        $type->save();

        return redirect()->route('types.index');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index');
    }
}
