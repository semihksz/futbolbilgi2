<?php

namespace App\Http\Controllers\Backend;

use App\Models\Squad;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\SquadRequest;
use App\Http\Controllers\Controller;

class SquadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Squad::where('is_active', 1)->where('lang', 'tr')->get();
        return view('admin.pages.squad', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SquadRequest $request)
    {
        $validate = $request->validated();

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/players'), $filename);
        }
        $new_player = Squad::create([
            'lang' => $request->lang,
            'team' => $validate['team'],
            'season_id' => $validate['season_id'],
            'image' => $filename,
            'name' => $validate['name'],
            'nationality' => $validate['nationality'],
            'position' => $validate['position'],
            'birthday' => $validate['birthday'],
            'age' => $validate['age'],
            'height' => $validate['height'],
            'weight' => $request->weight ? $request->weight : '',
            'shirt_number' => $validate['shirt_number'],
            'biography' => $request->biography,
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        if ($new_player) {
            return redirect()->back()->with('success', 'Oyuncu başarıyla eklendi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($takim_kadrosu)
    {
        $season_id = Season::where('slug', $takim_kadrosu)->select('id', 'season_date')->first();
        $playersTr = Squad::where('season_id', $season_id->id)->where('is_active', '1')->where('lang', 'tr')->get();
        $playersEn = Squad::where('season_id', $season_id->id)->where('is_active', '1')->where('lang', 'en')->get();
        return view('admin.pages.squad', compact('playersTr', 'playersEn', 'season_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Squad $squad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Squad $squad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Squad $squad)
    {
        //
    }
}
