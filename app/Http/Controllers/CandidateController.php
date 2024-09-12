<?php

namespace App\Http\Controllers;

use App\Http\Requests\Candidates\StoreCandidateRequest;
use App\Http\Requests\Candidates\UpdateCandidateRequest;
use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::latest()->get();
        return view('dashboard.candidates.index', compact('candidates'));
    }

    public function create()
    {
        $elections = Election::all();
        return view('dashboard.candidates.create', compact('elections'));
    }

    public function store(StoreCandidateRequest $request)
    {
        $validated = $request->validated();

        $election = Election::find($request->input('election_id'));

        try {
            DB::beginTransaction();

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photos', 'public');
                $validated['photo'] = $photoPath;
            }

            $validated['slug'] = Str::slug($election->title . ' ' . $validated['president_name'] . ' ' . $validated['vice_president_name'] . ' mulai ' . $election->start_date->format('H.i - j M Y') . ' sampai ' . $election->end_date->format('H.i - j M Y'));

            Candidate::create($validated);

            DB::commit();

            return redirect()->route('dashboard.candidates.index')
                ->with('successAddedCandidate', 'Berhasil menambahkan kandidat baru');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('dashboard.candidates.index')
                ->with('failedAddCandidate', 'Gagal menambahkan kandidat baru. Silahkan coba lagi!');
        }
    }

    public function show()
    {
        return view('dashboard.candidates.show');
    }

    public function edit(Candidate $candidate)
    {
        $elections = Election::latest()->get();
        return view('dashboard.candidates.edit', compact('candidate', 'elections'));
    }

    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $validated = $request->validated();

        $election = Election::find($request->input('election_id'));

        $candidate = Candidate::findOrFail($candidate->id);

        try {
            DB::beginTransaction();

            if ($request->hasFile('photo')) {
                if ($candidate->photo) {
                    Storage::disk('public')->delete($candidate->photo);
                }

                $photoPath = $request->file('photo')->store('photos', 'public');
                $validated['photo'] = $photoPath;
            }

            $validated['slug'] = Str::slug($election->title . ' ' . $validated['president_name'] . ' ' . $validated['vice_president_name'] . ' mulai ' . $election->start_date->format('H.i - j M Y') . ' sampai ' . $election->end_date->format('H.i - j M Y'));

            $candidate->update($validated);

            DB::commit();

            return redirect()->route('dashboard.candidates.index')
                ->with('updatedCandidateSuccess', 'Berhasil memperbarui data kandidat');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('dashboard.candidates.index')
                ->with('updateCandidateFailed', 'Gagal memperbarui data kandidat' . $e->getMessage());
        }
    }
}
