<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Course;
use App\Models\Daf;
use App\Models\DailyQuiz;
use App\Models\QuizMark;
use App\Models\User;
use App\Models\Trending;
use Illuminate\Http\Request;
use Auth;

class BookController extends Controller
{
    public function addCourse(Request $request)
    {
        // dd(Auth::check());
        $user_id = Auth::user()->id;
        $course = new Course;
        $course->user_id = $user_id;
        // dd($course->user_id);
        $course->label = $request->label;
        $course->value = $request->value;
        $course->save();
        
        return response()->json([
                'success'=>true,
                'message'=>'Course Added.'
            ]);
    }
    
    public function allCourse()
    {
        $allCourse = Course::get();
        
        return response()->json([
                'success'=>true,
                'data'=>$allCourse
            ]);
    }
    
    public function addRoom(Request $request)
    {
        $room = new Room;
        $room->course_id = $request->course_id;
        $room->label = $request->label;
        $room->value = $request->value;
        $room->save();
        
        return response()->json([
                'success'=>true,
                'message'=>'Room Added.'
            ]);
    }
    
    public function allRoom($value)
    {
        $course_info = Course::where('value',$value)->first();
        if($course_info)
        {
            $room_info = Room::where('course_id',$course_info->id)->get();
            // dd($course_info->id);
            
            return response()->json([
                'success'=>true,
                'data'=>$room_info
            ]);    
        }
        
        else
        {
            return response()->json([
                'success'=>false,
                'message'=>'No Room Found.'
            ]);   
        }
        
    }
    
    public function allDaf($value)
    {
        $room_info = Room::where('value',$value)->first();
        if($room_info)
        {
            $daf_info = Daf::where('room_id',$room_info->id)->get();
            
            $daf_info_list = array();
            
            for($i=0;$i<count($daf_info);$i++)
            {
                $daf_info_list[] =
                [
                    'label'=>$daf_info[$i]->label,
                    'value'=>
                    [
                        'pdf'=>$daf_info[$i]->pdf,
                        'video'=>$daf_info[$i]->video
                    ]
                ];
            }
            
            return response()->json([
                'success'=>true,
                'data'=>$daf_info_list
            ]);    
        }
        
        else
        {
            return response()->json([
                'success'=>false,
                'message'=>'No Daf Found.'
            ]);   
        }
        
    }
    
    
    
    public function getBook()
    {
        // dd(1);
        $room = Room::where('room_name','room1')->get();
        
        return response()->json([
             'success'   => true,
             'pdf'=>asset('uploads/pdf'),
             'video'=>asset('uploads/video'),
            'data' => $room
        ]);
    }
    
    public function getDailyQuiz()
    {
        $getDailyQuiz = DailyQuiz::get();
        
        $daily_quiz_list = array();
        foreach($getDailyQuiz as $key => $getDailyQuizes){
            $daily_quiz_list[$key]['id'] = $getDailyQuizes->id;
            $daily_quiz_list[$key]['question'] = $getDailyQuizes->question;
            $daily_quiz_list[$key]['correct answer'] = $getDailyQuizes->correct_answer;
            $daily_quiz_list[$key]['options'] = explode(',',$getDailyQuizes->options);
        }
        
        return response()->json([
            'success'=>true,
            'data'=>$daily_quiz_list
        ]);
        
    }
    
    public function postDailyQuiz(Request $request)
    {
        $user_id = Auth::user()->id;
        $existQuizMark = QuizMark::where('user_id',$user_id)->where('date',$request->date)->first();
        // dd($existQuizMark);
        if($existQuizMark)
        {
            return response()->json([
                'success'=>false,
                'message'=> 'You Alreday Quiz Submitted.'
            ]);
        }
        
        else
        {
            $postDailyQuiz = new QuizMark;
            $postDailyQuiz->user_id = $user_id;
            $postDailyQuiz->total_question = $request->total_question;
            $postDailyQuiz->correct_answer = $request->correct_answer;
            $postDailyQuiz->each_contain_marks = $request->each_contain_marks;
            $postDailyQuiz->total_marks = $request->total_marks;
            $postDailyQuiz->obtained_marks = $request->obtained_marks;
            $percentage = $request->obtained_marks/$request->total_marks*100;
            // dd($percentage);
            $postDailyQuiz->percentage = $percentage;
            $postDailyQuiz->date = $request->date;
            $postDailyQuiz->save();
            
            return response()->json([
                'success'=>true,
                'message'=> 'Quiz Submitted Successfully.'
            ]);
        }
    }
    
    public function leaderboard()
    {
        $user_ids= QuizMark::groupBy('user_id')->pluck('user_id');
        
        $data =array();
        foreach($user_ids as $key => $user_id)
        {
            $user_info = User::where('id',$user_id)->first();
            $check = QuizMark::where('user_id',$user_id)->sum('obtained_marks');
            
            $data[$key]['user_id']=$user_id;
            $data[$key]['name']=$user_info->name;
            $data[$key]['marks'] =$check;
        }
        
        $marks = array_column($data, 'marks');
        array_multisort($marks, SORT_DESC, $data);
        
        return response()->json([
            'success'=>true,
            'data'=> $data
        ]);
    }
    
    public function getTrending()
    {
        $getTrending = Trending::get();
        $getTrending_info = [];
        
        for($i=0;$i<count($getTrending);$i++)
        {
            $getTrending_info[] = Daf::where('id',$getTrending[$i]->daf_id)->first();
        }
        
        return response()->json([
            'success'=> true,
            'data'=> $getTrending_info
        ]);
    }
    
    
    public function getVideoChunk($id, $chunkNumber)
{
    $info = Daf::findOrFail($id);
    $videoUrl = 'https://customdemo.website/apps/torah-memory-palace/public/uploads/video/bk_daf%202.mp4';

    // Calculate the range for the chunk
    $chunkSize = 1024 * 1024; // 1MB chunks for example
    $startByte = $chunkNumber * $chunkSize;
    $endByte = ($chunkNumber + 1) * $chunkSize - 1;

    // Fetch the chunked content using file_get_contents
    $options = [
        'http' => [
            'header' => "Range: bytes=$startByte-$endByte\r\n",
        ],
    ];

    $context = stream_context_create($options);
    $chunkedContent = file_get_contents($videoUrl, false, $context);

    // Convert binary data to base64 for inclusion in JSON
    $base64Chunk = base64_encode($chunkedContent);

    // Return JSON response with the chunked video data
    return response()->json([
        'success' => true,
        'data' => [
            'chunk' => $base64Chunk,
            'contentRange' => "bytes $startByte-$endByte/*",
            'contentLength' => strlen($chunkedContent),
            'contentType' => 'video/mp4', // adjust based on your video format
        ],
    ]);
}

    public function storeVideo()
    {
        // Replace this with the actual base64-encoded data
        
        // Decode the base64-encoded data
        $decodedData = base64_decode($encodedData);
        // dd($decodedData);
        
        // Save the decoded data to a file
        $storee = file_put_contents(public_path('output.mp4'), $decodedData);
        dd($storee);
    }

    
}