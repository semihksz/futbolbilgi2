<?php

namespace App\Http\Controllers\Backend;

use App\Models\Squad;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_seasons = Season::all();
        return view('admin.pages.season.allseason', compact('all_seasons'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'season_date' => 'required',
            ],
            [
                'season_date' => 'Sezon adı girmek zorunludur!'
            ]
        );

        $new_season = Season::create([
            'season_date' => $validate['season_date'],
            'created_by' => auth()->id(),
        ]);
        if ($new_season) {
            return redirect('/admin/sezon/' . $new_season->slug)->with('success', 'Sezon başarıyla eklendi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($sezon)
    {
        $season = Season::where('slug', $sezon)->first();
        return view('admin.pages.season.season', compact('season'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Season $season)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sezon)
    {
        $season = Season::where('id', $sezon)->first();
        if ($season->delete()) {
            return redirect()->route('sezon.index')->with('success', 'Sezon başarıyla silindi.');
        }
    }
}
