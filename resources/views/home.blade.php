@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="text-center">Welcome to Stuck Overflow</h4>
                    <p class="text-center">Membantu anda semua yang sedang stuck</p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Your Question</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            
                            @foreach ($questions as $question)
                            <tr>
                                <td width="80%">
                                    <a href="{{route('question.show',['question'=>$question->id])}}">{{$question->title}}</a> <br>
                                    
                                    <small class="mr-3">{{date_format(date_create($question->updated_at),'F, d Y ')}} </small>
                                </td>
                                <td>
                                    <a href="{{route('question.show',['question'=>$question->id])}}" class="btn btn-success btn-sm m-1">
                                    <i class="far fa-eye"></i>
                                    </a>
                                    <a href="/questions/{{ $question->id }}/edit" class="btn btn-warning btn-sm m-1">
                                    <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="/questions/{{ $question->id }}" style="display:inline;" onclick="return confirm('Hapus Pertanyaan Ini?')" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm m-1 "><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                            @if($questions->isEmpty())
                                <h4 class="text-center">You Haven't Made a Question 😥</h4>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Your Answer</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            
                            @foreach ($answers as $answer)
                            <tr>
                                <td width="80%">
                                    From Question : <a href="{{route('question.show',['question'=>$answer->question->id])}}">{{$answer->question->title}}</a> <br>
                                    
                                    <small>Your answer : {{  strlen(strip_tags($answer->content)) > 20 ? substr(strip_tags($answer->content),0,20)."...." :strip_tags($answer->content) }}</small> <br>
                                
                                    <small class="mr-3">{{date_format(date_create($answer->updated_at),'F, d Y ')}} </small>
                                    @if ($answer->is_answer)
                                        <small> Status: <i class="fa fa-check-circle text-success" aria-hidden="true"> </i> Aprove </small> 
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('question.show',['question'=>$answer->question->id])}}" class="btn btn-success btn-sm m-1">
                                    <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{route('answer.edit',['answer'=>$answer->id])}}" class="btn btn-warning btn-sm m-1">
                                    <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{route('answer.delete',['answer'=>$answer->id])}}" style="display:inline;" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm m-1 "><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                            @if($answers->isEmpty())
                                <h4 class="text-center">You Haven't Made The Answer 😥</h4>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
