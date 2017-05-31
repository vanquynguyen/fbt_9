<?php

namespace App\Http\Controllers\Admin;

use App\Models\Itinerary;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItineraryRequest;

class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $itineraries = Itinerary::where('tour_id', $id)->paginate(10);

        return view('admin.manage_tours.itineraries', compact('itineraries', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $maxDay = Itinerary::where('tour_id', $id)->max('day');
        return view('admin.manage_tours.create_itinerary', ['id' => $id, 'maxDay' => $maxDay]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItineraryRequest $request)
    {
        if (Itinerary::create($request->all())) {
            return redirect()->route('itineraries.tour', [$request->tour_id]);
        } else {
            return back()->with(['message' => trans('messages.create_failed')]);
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
            $itinerary = Itinerary::findOrFail($id);
        } catch (\Exception $e) {
            return back()->with('message', trans('messages.id_errors'));
        }

        return view('admin.manage_tours.edit_itinerary', compact('itinerary'), ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItineraryRequest $request, $id)
    {
        $itinerary = Itinerary::find($id);
        if ($itinerary->update($request->all())) {
            return redirect()->route('itinerary.edit', [$id])->with(['message' => trans('messages.update_success')]);
        } else {
            return redirect()->route('itinerary.edit', [$id])->with('message', trans('messages.update_failed'));
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
        $itinerary = Itinerary::findOrFail($id);
        if ($request->ajax()) {
            $itinerary->delete();
            return response(['status' => trans('messages.success')]);
        }
        return response(['status' => trans('messages.failed')]);
    }
}
