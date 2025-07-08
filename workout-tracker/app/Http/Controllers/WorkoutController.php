<?php
namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class WorkoutController extends Controller
{
    public function index()
    {
        return Auth::user()->workouts;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        return Auth::user()->workouts()->create($data);
    }

    public function show($id)
    {
        return Workout::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    }

    public function update(Request $request, $id)
    {
        $workout = Workout::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $workout->update($request->only(['title', 'description', 'date']));
        return $workout;
    }

    public function destroy($id)
    {
        $workout = Workout::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $workout->delete();
        return response()->json(['message' => 'Workout deleted']);
    }
}
