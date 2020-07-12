<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionComment;
use App\Tag;
use Illuminate\Http\Request;

class QuestionsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mengambil seluruh data pada table questions dan data dikirim beserta view
        $questions = Question::orderBy('total_vote', 'desc')->get();
        return view('questions', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Memanggil view form create question
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validasi form
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $newQuestion = Question::create($request->all());

        $tags = explode(",", $request->tag);

        $tagData = [];

        foreach ($tags as $value) {

            $tag["tag_name"] = $value;
            $tagData[] = $tag;

        }

        foreach ($tagData as $value) {
            
            $tag = Tag::firstOrCreate($value);
            $newQuestion->tags()->attach($tag->id);

        }

        //Simpan dalam table questions
        

        //redirect 
        return redirect('/questions')->with('status', 'Pertanyaan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        
        return view('question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {

        $tag = [];

        foreach ($question->tags as $key => $value) {

            $tag[] = $value->tag_name;

        }

        $tags = implode(",", $tag);

        return view('question.edit', compact('question','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $Question = Question::find($question->id);
        $Question->title = $request->title;
        $Question->content = $request->content;
        $Question->save();

        $Question->tags()->detach($Question->tag);


        $tags = explode(",", $request->tag);

        $tagData = [];

        foreach ($tags as $value) {

            $tag["tag_name"] = $value;
            $tagData[] = $tag;

        }

        foreach ($tagData as $value) {
            
            $tag = Tag::firstOrCreate($value);
            $Question->tags()->attach($tag->id);

        }

        return redirect("/")->with('status', 'Pertanyaan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
        Question::destroy($question->id);

        //redirect 
        return redirect('/questions')->with('status', 'Pertanyaan berhasil dihapus!');
    }

    // Bagian Komentar

    public function addComment(Request $request)
    {
        QuestionComment::create($request->all());

        return redirect("/questions/$request->question_id")->with('status', 'Komentar berhasil dibuat!');
    }

}
