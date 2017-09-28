<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Font;
use App\Models\Language;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    //全文搜索

    public function search(Request $request)
    {
        $q = $request->get('query');

        if ($q) {

            $fonts = Font::search($q)->get();

            return $fonts;

            $users = User::search($q)->paginate(2);

            $languages = Language::search($q)->paginate(2);

        }
        return view('admin.search', compact('fonts', 'q','users','languages'));
    }
}
