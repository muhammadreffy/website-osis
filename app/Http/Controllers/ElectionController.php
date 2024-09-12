<?php

namespace App\Http\Controllers;

use App\Http\Requests\Election\StoreElectionRequest;
use App\Http\Requests\Election\UpdateElectionRequest;
use App\Models\Election;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ElectionController extends Controller
{
    public function index()
    {
        $elections = Election::latest()->get();

        $elections->map(function ($election) {
            $now = Carbon::now();

            $startDate = $election->start_date;
            $endDate = $election->end_date;

            if ($now->lt($startDate)) {
                $election->status = 'Akan Datang';
            } elseif ($now->gte($startDate) && $now->lte($endDate)) {
                $election->status = 'Sedang Berlangsung';
            } else {
                $election->status = 'Ditutup';
            }

            return $election;
        });

        return view('dashboard.elections.index', compact('elections'));
    }

    public function create()
    {
        return view('dashboard.elections.create');
    }

    public function store(StoreElectionRequest $request)
    {

        $validated = $request->validated();

        $startDate = Carbon::parse($validated['start_date']);
        $endDate = Carbon::parse($validated['end_date']);

        try {
            DB::beginTransaction();

            $validated['slug'] = Str::slug($validated['title'] . ' mulai ' . $startDate->format('H.i - j M Y') . ' sampai ' . $endDate->format('H.i - j M Y'));

            Election::create($validated);

            DB::commit();

            return redirect()->route('dashboard.elections.index')
                ->with('successAddedElection', 'Berhasil menambahkan kategori pemilihan baru');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('dashboard.elections.index')
                ->with('failedAddElection', 'Gagal menambahkan kategori pemilihan. Silahkan coba lagi!');
        }
    }

    public function show(Election $election)
    {
        return view('dashboard.elections.show', compact('election'));
    }

    public function edit(Election $election)
    {
        return view('dashboard.elections.edit', compact('election'));
    }

    public function update(UpdateElectionRequest $request, Election $election)
    {
        $validated = $request->validated();

        $startDate = Carbon::parse($validated['start_date']);
        $endDate = Carbon::parse($validated['end_date']);

        try {
            DB::beginTransaction();

            $validated['slug'] = Str::slug($validated['title'] . ' mulai ' . $startDate->format('H.i - j M Y') . ' sampai ' . $endDate->format('H.i - j M Y'));

            $election->update($validated);

            DB::commit();

            return redirect()->route('dashboard.elections.index')
                ->with('electionUpdatedSuccess', 'Kategori pemilihan berhasil di perbarui');
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->route('dashboard.elections.index')
                ->with('electionUpdateFailed', 'Kategori pemilihan gagal di perbarui');
        }
    }

    public function destroy(Election $election)
    {
        try {
            DB::beginTransaction();

            $election->delete();

            DB::commit();

            return redirect()->route('dashboard.elections.index')
                ->with('deletedElectionSuccess', 'Berhasil menghapus kategori pemilihan');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('dashboard.elections.index')
                ->with('deleteElectionFailed', 'Gagal menghapus kategori pemilihan');
        }
    }
}
