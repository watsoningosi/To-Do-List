<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Team $team)
    {
        $attributes = request()->validate([
            'name' => 'string|required|max:255|alpha_dash|unique:users,email',
            'about' => 'required|max:255|string',
            'owner_id' => 'required'
        ]);

        Team::create([
            'name' => $attributes['name'],
            'about' => $attributes['about'],
            'owner_id' => $attributes['owner_id'],

        ]);

        return redirect('/admin/teams/')->with('success', 'Team added Successfully');
    }

    /**
     * Display the specified resource.
     * SELECT *, COUNT(*) FROM products GROUP BY category_id HAVING count(*) > 1;
     * DB::table('teams')
     *         ->leftJoin('members','members.team_id', '=', 'teams.id')
     *       ->selectRaw('COUNT(*) as memberz')
     *     ->groupBy('teams.id')
     *   ->get();
     * 
     */
    public function show(Team $team)
    {
        $team = DB::table('members')
            ->select('team_id', DB::raw('COUNT(*) as members'))
            ->groupBy('team_id')
            ->get();
      return view('teams.show', ['team' => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect('/admin/teams')->with('success', 'Team deleted successfully');
    }
}
