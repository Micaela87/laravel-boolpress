<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class HomeController extends Controller
{
    public function home() {

        return view('home');

    }

    // public function show($id) {

    //     $series = Series::findOrFail($id);

    //     return view('series', ['series' => $series]);
    // }

    // public function create() {
    //     return view('create');
    // }

    // public function store(Request $request) {

    //     $data = $request -> validate([
    //         'title' => 'required|unique:series|max:255',
    //         'author' => 'required|max:255',
    //         'release_date' => 'required|date',
    //         'rating' => 'max:5|min:0'
    //     ]);

    //     $newSeries = Series::create($data);

    //     return redirect() -> route('series', ['id' => $newSeries -> id]);
    // }

    // public function edit($id) {

    //     $series = Series::findOrFail($id);

    //     return view('edit', ['series' => $series]);
    // }

    // public function update(Request $request, $id) {

    //     $data = $request -> validate([
    //         'title' => 'required|max:255|unique:series,title,' . $id,
    //         'author' => 'required|max:255',
    //         'release_date' => 'required|date',
    //         'rating' => 'max:5|min:0'
    //     ]);

    //     $updatedtSeries = Series::findOrFail($id);
    //     $updatedtSeries -> update($data);

    //     return redirect() -> route('series', ['id' => $updatedtSeries -> id]);
    // }

    // public function delete($id) {

    //     $seriesToDelete = Series::findOrFail($id);
    //     $seriesToDelete -> delete();

    //     return back();
    // }
}
