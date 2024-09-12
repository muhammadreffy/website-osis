<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Election;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // $userCount = User::leftJoin('admins', 'users.id', '=', 'admins.user_id')
        //     ->whereNotIn('admins.user_id')
        //     ->count();

        $adminIds = Admin::pluck('user_id')->toArray();

        $userCount = User::whereNotIn('id', $adminIds)->count();

        $categoryCount = Election::count();

        return view('dashboard.index', compact('userCount', 'categoryCount'));
    }
}
