<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Inertia;
use App\Models\Event;

class CategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        // ]);

        $category = new Category();
        $category->name = $request->name;
        $category->user_id = auth()->id();
        $category->save();

        return redirect()->route('categories.manage');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $categoryEvents = Event::where('category_id', $id)->get();

        return Inertia::render('CategoryShow', [
            'category' => $category,
            'categoryEvents' => $categoryEvents
        ]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return Inertia::render('Category/Edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        // ]);

        $category = Category::findOrFail($id);
        // $category->name = $validatedData['name'];
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::with('events')->findOrFail($id);

        // if ($category->events()->count() > 0) {
        //     return redirect()->route('categories.manage')->with('error', 'Cette catégorie ne peut pas être supprimée car elle contient des événements.');
        // }
        foreach ($category->events as $event) {
            $event->delete();
        }

        $category->delete();

        return redirect()->route('categories.manage')->with('successMessage', 'Catégorie supprimée avec succès.');
    }

    public function manage()
    {
        $categories = Category::all();
        return Inertia::render('Category/Manage', ['categories' => $categories]);
    }
}
