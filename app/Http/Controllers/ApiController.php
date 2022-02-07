<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class ApiController extends Controller
{
    public function getAllTvSeries() {
        $allSeries = Series::all();

        return response()->json(['data' => $allSeries]);
    }

    public function deleteTvSeries($id) {

        $tvSeriesToDelete = Series::findOrFail($id);

        $tvSeriesToDelete -> delete();

        return response()->json(['data' => Series::all()]);
    }

    public function getSingleTvSeries($id) {

        $singleTvSeries = Series::findOrFail($id);

        return response()->json(['data' => $singleTvSeries]);
    }

    public function storeNewTvSeries(Request $request) {

        $data = $request -> validate([
            'title' => 'required|unique:series|max:255',
            'author' => 'required|max:255',
            'release_date' => 'required|date',
            'rating' => 'max:5|min:0'
        ]);

        $newSeries = Series::create($data);

        return response('ok', 200);
    }

    public function updateTvSeries(Request $request, $id) {
        $data = $request -> validate([
            'title' => 'required|max:255|unique:series,title,' . $id,
            'author' => 'required|max:255',
            'release_date' => 'required|date',
            'rating' => 'max:5|min:0'
        ]);

        $updatedtSeries = Series::findOrFail($id);
        $updatedtSeries -> update($data);

        return response('ok', 200);

    }
}
