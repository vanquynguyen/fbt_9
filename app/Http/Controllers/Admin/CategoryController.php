<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.manage_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::pluck('name', 'id')->toArray();
        return view('admin.manage_categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CategoryRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category;
        if ($category->create($request->all())) {
            return redirect()->route('category.index');
        } else {
            return back()->with('message', trans('messages.create_failed'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $parents = Category::pluck('name', 'id')->toArray();
            $category = Category::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('message', trans('messages.id_errors'));
        }
        
        return view('admin.manage_categories.edit', compact('parents', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserRequest;  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = new Category;
        $category = $category->find($id);

        if ($category->update($request->all())) {
            return redirect()->route('category.edit', [$id])->with('message', trans('messages.update_success'));
        } else {
            return redirect()->route('category.edit', [$id])->with('message', trans('messages.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $category = Category::findOrFail($id);
        if ($request->ajax()) {
            $category->delete($request->all());
            return response(['status' => trans('messages.success')]);
        }
        return response(['status' => trans('messages.failed')]);
    }
}
