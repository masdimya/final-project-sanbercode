<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Answer;
use App\AnswerComment;

class AnswerController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content     = $request->input('answer');
        $question_id = $request->input('question_id');
        $user_id     = Auth::id();

        $data = [
            'question_id' => $question_id,
            'user_id'     => $user_id,
            'content'     => $content  
        ];

        Answer::create($data);
        return redirect()->route('question.show',['question'=>$question_id]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $content = $request->input('content');

        $answer = Answer::find($id);
        $answer->content =  $content;
        $answer->save();

        return redirect()->route('question.show',['question'=>$answer->question_id]);

    }

    public function edit($answer_id){
        $answer = Answer::find($answer_id);
        
        return view('answer.edit',compact('answer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Answer::find($id)->delete();
        return redirect()->route('home');
    }


    // Bagian Komentar

    public function addComment(Request $request)
    {

        // dd($request->all());

        AnswerComment::create($request->all());

        return redirect("/questions/$request->question_id")->with('status', 'Komentar berhasil dibuat!');
    }

    public function approveAnswer($answer_id)
    {
        $answer = Answer::find($answer_id);

        $answer->is_answer = true;
        $answer->save();

        $user = User::find($answer->user_id);
        $user->reputasi = $user->reputasi + 15;
        $user->save();

        return redirect()->route('question.show',['question'=>$answer->question_id]);

    }
}
