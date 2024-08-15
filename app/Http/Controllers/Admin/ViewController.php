<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use App\Models\Room;
use App\Models\Daf;
use App\Models\DailyQuiz;
use App\Models\Trending;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ViewController extends Controller
{
    public function adminUsers()
    {
        $users = User::paginate(10);
        return view('admin.pages.users', compact('users'));
    }

    public function adminbook()
    {
        $customError = session('customError');

        if ($customError)
        {
            return view('admin.pages.book',compact('customError'));
        }

        return view('admin.pages.book',compact('customError'));
    }

    public function roomPdfAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_name' => 'required',
            'title' => 'required',
            'pdf' => 'required',
            'video' => 'required',
        ]);

        if ($validator->passes())
        {
            $room = new Room;
            $room->room_name = $request->room_name;
            $room->title = $request->title;

            if ($request->hasFile('pdf') || $request->File('pdf'))
            {
                $pdfnumber = rand();
                $pdf = $request->file('pdf');
                $pdf->move(base_path('public/uploads/pdf'), '_' . $pdfnumber . '.' . $pdf->getClientOriginalName());
                $pdfNameToStore = 'uploads/pdf/' . '_' . $pdfnumber . '.' . $pdf->getClientOriginalName();
                $room->pdf = $pdfNameToStore;
            }

            if ($request->hasFile('video'))
            {
                $videonumber = rand();
                $video = $request->file('video');
                $video->move(base_path('public/uploads/video'), '_' . $videonumber . '.' . $video->getClientOriginalName());
                $videoNameToStore = 'uploads/video/' . '_' . $videonumber . '.' . $video->getClientOriginalName();
                $room->video = $videoNameToStore;
            }

            $room->save();
            return redirect()->route('admin.book')->with('message', "Room Add Successfully");
        }

        else
        {
            // dd($validator);
            // return redirect()->route('admin.book')->withErrors($validator)->withInput()->with('message',$errors->all());
            return redirect()->route('admin.book')->withErrors($validator)->withInput()->with('customError', $validator->errors()->all());
        }
    }

    public function adminDailyQuiz()
    {
        $customError = session('customError');
        return view('admin.pages.daily_quiz',compact('customError'));
    }

    public function adminDailyQuizAdd(Request $request)
    {
        $conc_dt = $request->date.' '.$request->time.':00';
        $dateTime = Carbon::parse($conc_dt);
        $add_datetime = $dateTime->copy()->addHours(24);

        $originalDateTimeString = $dateTime->toDateTimeString();
        $newDateTimeString = $add_datetime->toDateTimeString();

        $validator = Validator::make($request->all(), [
            'question.*' => 'required',
            'correct_answer.*' => 'required',
            'option1.*' => 'required',
            'option2.*' => 'required',
            'option3.*' => 'required',
            'option4.*' => 'required',
        ]);

        if($validator->passes())
        {
            $data = $request->all();
            for($i=0;$i<count($data['question']);$i++)
            {
                $question = $data['question'][$i] ?? null;
                $correctAnswer = $data['correct_answer'][$i] ?? null;
                $option1 = $data['option1'][$i] ?? null;
                $option2 = $data['option2'][$i] ?? null;
                $option3 = $data['option3'][$i] ?? null;
                $option4 = $data['option4'][$i] ?? null;
                $question_trim = trim($question);$correctAnswer_trim = trim($correctAnswer);$option1_trim = trim($option1);$option2_trim = trim($option2);$option3_trim = trim($option3);$option4_trim = trim($option4);


                if ($question_trim !== null && $correctAnswer_trim !== null && $option1_trim !== null && $option2_trim !== null && $option3_trim !== null && $option4_trim !== null && $originalDateTimeString !== null)
                {
                    $options_string = implode(',', [$option1_trim, $option2_trim, $option3_trim, $option4_trim]);
                    $addDailyquiz = new DailyQuiz;
                    $addDailyquiz->question = $question_trim;
                    $addDailyquiz->correct_answer = $correctAnswer_trim;
                    $addDailyquiz->options = $options_string;
                    $addDailyquiz->date_time = $originalDateTimeString;
                    $addDailyquiz->expiry_date_time = $newDateTimeString;
                    $addDailyquiz->save();
                }

                else
                {
                    return redirect()->route('admin.daily.quiz')->with('error', "All Fields Are Must Be Filled.");
                }

            }

            return redirect()->route('admin.daily.quiz')->with('message', "Daily Quiz Add Successfully");
        }

        else
        {
            return redirect()->route('admin.daily.quiz')->withErrors($validator)->withInput()->with('customError', $validator->errors()->all());
        }
    }

    public function adminTrending(Request $request)
    {
        $course = Course::get();
        $room = Room::get();
        $courseType = $request->query('course_type') ?? "";
        $roomType = $request->query('room_type') ?? "";
        $roomId_exist = Room::where('course_id',$courseType)->first();
        if($roomId_exist)
        {
            $roomType = (int)$roomType;
            if($roomId_exist->id === $roomType)
            {
                $daf = Daf::where('room_id',$roomType)->get();
                return view('admin.pages.trending',compact('course','room','daf'));
            }
            else
            {
                return redirect()->back()->with('error', "Data Doesn't Exist.");
            }

        }

        return view('admin.pages.trending',compact('course','room'));
    }

    public function adminTrendingPost($id)
    {
        $trending_dateTime = Carbon::now()->format('Y-m-d H:i:s');
        $trending_dateTimeAddHour = Carbon::now()->addHours(24)->format('Y-m-d H:i:s');
        $daf_label = Daf::where('id',$id)->first();
        $trending_post = new Trending;
        $trending_post->daf_id = $id;
        $trending_post->trending_date_time = $trending_dateTime;
        $trending_post->trending_expiry_date_time = $trending_dateTimeAddHour;
        $trending_post->save();

        // return redirect()->route('admin.trending')->with('message', "Now This Trending.");
        return redirect()->back()->with('message', "This " .$daf_label->label. "  Is Trending Now.");
    }

    public function adminTrendingDel($id)
    {
        $trendingDel_Info = Daf::where('id',$id)->first();
        $trending_Del = Trending::where('daf_id',$id)->delete();

        return redirect()->back()->with('message', "This " .$trendingDel_Info->label. "  Is Removed From Trending.");

    }

}
