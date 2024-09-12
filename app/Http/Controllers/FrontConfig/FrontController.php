<?php

namespace App\Http\Controllers\FrontConfig;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function elections()
    {
        $elections = Election::withCount('candidates')->get();

        $elections->map(function ($election) {

            $now = Carbon::now();

            $startDate = $election->start_date;
            $endDate = $election->end_date;

            if ($now->lt($startDate)) {
                $election->status = 'Akan Datang';
            } else if ($now->gte($startDate) && $now->lte($endDate)) {
                $election->status = 'Sedang Berlangsung';
            } else {
                $election->status = 'Ditutup';
            }

            return $election;
        });

        return view('front.elections.index', compact('elections'));
    }

    public function candidates(Election $election)
    {
        $candidates = Candidate::where('election_id', $election->id)
            ->withCount(['votes' => function ($query) use ($election) {
                $query->where('election_id', $election->id);
            }])
            ->get();

        $hasVoted = Vote::where('election_id', $election->id)
            ->where('user_id', Auth::user()->id)
            ->exists();

        $votedId = Vote::where('user_id', Auth::user()->id)
            ->where('election_id', $election->id)->first();

        return view('front.elections.candidates', compact('candidates', 'election', 'hasVoted', 'votedId'));
    }

    public function vote(Election $election, Candidate $candidate)
    {
        if (!$this->isElectionOngoing($election)) {
            return redirect()->back()->with('error', 'Pemilihan belum dimulai atau sudah di tutup');
        }

        $hasVoted = Vote::where('election_id', $election->id)
            ->where('user_id', Auth::user()->id)->exists();

        if ($hasVoted) {
            return redirect()->back()->with('hasVoted', 'Siswa hanya berhak sekali memilih dalam satu kategori pemilihan');
        }

        try {
            DB::beginTransaction();

            Vote::create([
                'user_id' => Auth::user()->id,
                'election_id' => $election->id,
                'candidate_id' => $candidate->id,
            ]);

            DB::commit();

            return redirect()->route('front.elections.candidates', $election->slug)
                ->with('successVoted', 'Berhasil memberikan pilihan. Terimakasih');

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('front.elections.candidates', $election->slug)
                ->with('failedVoted', 'Gagal memberikan pilihan. Silahkan coba lagi!');
        }
    }

    public function cancel_vote(Election $election, Vote $vote)
    {
        // $checkVote = Vote::where('election_id', $election->id)
        //     ->where('user_id', Auth::user()->id)->first();



        try {
            DB::beginTransaction();

            $vote->delete();

            DB::commit();

            return redirect()->route('front.elections.candidates', $election->slug)
                ->with('cancelVoteSuccess', 'Berhasil membatalkan pilihan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('front.elections.candidates', $election->slug)
                ->with('cancelVoteFailed', 'Gagal membatalkan pilihan');
        }
    }

    private function isElectionOngoing(Election $election)
    {
        $now = Carbon::now();

        $startDate = $election->start_date;
        $endDate = $election->end_date;

        return $now->gte($startDate) && $now->lte($endDate);
    }
}
