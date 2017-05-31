<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use UploadFile;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tour = $request->tour;
        $tours = Tour::search($tour)->paginate(10);
        $tours->appends(['tour' => $tour]);
        return view('admin.manage_tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('cat_type', 0)->pluck('name', 'id');
        return view('admin.manage_tours.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TourRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourRequest $request)
    {
        $input = $request->all();
        //upload file
        $file = $request->file('image');
        $input['image'] = UploadFile::upload($file, 'images');

        if (Tour::create($input)) {
            return redirect()->route('tour.index');
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
            $categories = Category::where('cat_type', 0)->pluck('name', 'id');
            $tour = Tour::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->route('tour.index')->with('message', trans('messages.id_errors'));
        }
        
        return view('admin.manage_tours.edit', compact('categories', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\TourRequest;  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TourRequest $request, $id)
    {
        $tour = Tour::find($id);
        $input = $request->all();
        //upload file
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $input['image'] = UploadFile::upload($file, 'images');
        }
        if ($tour->update($input)) {
            return redirect()->route('tour.edit', [$id])->with('message', trans('messages.update_success'));
        } else {
            return redirect()->route('tour.edit', [$id])->with('message', trans('messages.update_failed'));
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
        $tour = Tour::findOrFail($id);
        if ($request->ajax()) {
            $tour->delete();
            return response(['status' => trans('messages.success')]);
        }
        return response(['status' => trans('messages.failed')]);
    }
}
