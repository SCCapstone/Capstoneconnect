@extends('layouts.master')

@section('title')
@parent
@stop

@section('header')
Capstone Connect
@stop

@section('content')
    <?php $mostRecentEvalDate = Evaluation::max('created_at');
                    $evaluation = Evaluation::where('created_at', $mostRecentEvalDate)->first();
            ?> 
    <?php $mostRecentAnswerDate = Answer::max('created_at');
                    $answer = Answer::where('created_at', $mostRecentAnswerDate)->first();
            ?>
    @if($evaluation!=null && $answer!=null)   
        <table class="table table-bordered table-groups pull-right">
            
            <tr>
                <td>{{$evaluation->q1}}</td>
                <td>{{$answer->ans1}}</td>
            </tr>
            <tr>
                <td>{{$evaluation->q2}}</td>
                <td>{{$answer->ans2}}</td>
            </tr>
            <tr>
                <td>{{$evaluation->q3}}</td>
                <td>{{$answer->ans3}}</td>
            </tr>
            <tr>
                <td>{{$evaluation->q4}}</td>
                <td>{{$answer->ans4}}</td>
            </tr>
            <tr>
                <td>{{$evaluation->q5}}</td>
                <td>{{$answer->ans5}}</td>
            </tr>
            <tr>
                <td>{{$evaluation->q6}}</td>
                <td>{{$answer->ans6}}</td>
            </tr>
            <tr>
                <td>{{$evaluation->q7}}</td>
                <td>{{$answer->ans7}}</td>
            </tr>
            <tr>
                <td>{{$evaluation->q8}}</td>
                <td>{{$answer->ans8}}</td>
            </tr>
            <tr>
                <td>{{$evaluation->q9}}</td>
                <td>{{$answer->ans9}}</td>
            </tr>
            <tr>
                <td>{{$evaluation->q10}}</td>
                <td>{{$answer->ans10}}</td>
            </tr>
            <tr>
                <td>Comments</td>
                <td>{{$answer->comment}}</td>
            </tr>
        </table>
    @endif
    <br><br>
    {{ HTML::linkRoute('evaluation.create', 'Create New Evaluation', NULL, array('class' => 'btn btn-default')) }}
</div>
@stop