<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DailyQuiz;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function indexPage()
    {
        return view('users.pages.index');
    }

    public function aboutPage()
    {
        return view('users.pages.about');
    }

    public function dafyumiPage()
    {
        return view('users.pages.DafYumi');
    }

    public function contactPage()
    {
        return view('users.pages.contact');
    }

    public function faqPage()
    {
        return view('users.pages.faq');
    }

    public function dragPage()
    {
        return view('users.pages.drag');
    }

    public function leaderboardPage()
    {
        return view('users.pages.leaderboard');
    }

    public function personalPage()
    {
        return view('users.pages.personal');
    }

    public function dashboardPage()
    {
        return view('users.pages.dashboard');
    }

    public function profilePage()
    {
        return view('users.pages.profile');
    }

    public function testPage()
    {
        return view('users.pages.test');
    }

    public function dailyPage()
    {
        $DailyQuiz = DailyQuiz::get();
        // dd($check);
        return view('users.pages.daily',compact('DailyQuiz'));
    }


}
