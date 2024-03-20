<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechnicalSquadRequest;
use App\Models\Season;
use App\Models\TechnicalSquad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicalSquadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(TechnicalSquadRequest $request)
    {
        $validate = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time()  . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/technical_squad'), $filename);
        }

        $new_technical = TechnicalSquad::create([
            'lang' => $request->lang,
            'team' => $validate['team'],
            'season_id' => $validate['season_id'],
            'image' => $filename,
            'mission' => $validate['mission'],
            'name' => $validate['name'],
            'nationality' => $validate['nationality'],
            'birthday' => $validate['birthday'],
            'is_active' => '1',
            'biography' => $request->biography,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        if ($new_technical) {
            return redirect()->back()->with('success', 'Yeni sorumlu eklendi.');
        } else {
            return redirect()->back()->withErrors('error', 'Sorumlu eklenirken bir hata oluştu.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($teknik_kadro)
    {
        $season_id = Season::where('slug', $teknik_kadro)->select('id', 'season_date')->first();
        $kadroTr = TechnicalSquad::where('season_id', $season_id->id)->where('is_active', '1')->where('lang', 'tr')->get();
        $kadroEn = TechnicalSquad::where('season_id', $season_id->id)->where('is_active', '1')->where('lang', 'en')->get();
        return view('admin.pages.technicalsquad.index', compact('kadroTr', 'kadroEn', 'season_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TechnicalSquad $technicalSquad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TechnicalSquadRequest $request, TechnicalSquad $teknik_kadro)
    {
        $validate = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/technical_squad'), $filename);
            $teknik_kadro->image = $filename;
        }

        $teknik_kadro->lang = $request->lang;
        $teknik_kadro->team = $validate['team'];
        $teknik_kadro->season_id = $validate['season_id'];
        $teknik_kadro->mission = $validate['mission'];
        $teknik_kadro->name = $validate['name'];
        $teknik_kadro->nationality = $validate['nationality'];
        $teknik_kadro->birthday = $validate['birthday'];
        $teknik_kadro->is_active = '1';
        $teknik_kadro->biography = $request->biography;
        $teknik_kadro->updated_by = Auth::id();

        if ($teknik_kadro->save()) {
            return redirect()->back()->with('success', 'Sorumlu güncellendi.');
        } else {
            return redirect()->back()->withErrors('error', 'Sorumlu güncellenirken bir hata oluştu.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TechnicalSquad $technicalSquad)
    {
        //
    }
}
