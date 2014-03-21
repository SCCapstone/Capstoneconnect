@extends('layouts.master')

@section('title')
@parent
@stop

@section('header')
Download CSV File
@stop

@section('content')

    <?php
        $answers = ExportCSV::all();
        $questions = Evaluation::all();
        //Get the answer id number
        $ansId = $answers->lists('eid', 'eid');
        //Get the evaluation id number
        $evalId = $questions->lists('id', 'id');
    ?>

    <!-- Post message if successful -->
    @if (Session::get('screenAnnounce'))
        <div class = "alert alert-success"> {{ Session::get('screenAnnounce') }} </div>
    @endif

    @if($ansId == null)
        <p1> No evaluations have been completed yet.</p1>
    @elseif($ansId != null )    
            @for($i = 1; $i <= count($ansId)*2; $i++)
                {{-- Check to see if there is an answer for each questionnaire --}}
                @if(array_key_exists($i, $ansId))
                    {{ Form::open(array('route' => array('download_csv'))) }}

                    <!-- eid is variable passed to controller, eid = $i -->
                    {{ Form::hidden('eid', $i) }}            
      
                    <div class="form group">
                        {{ Form::submit("Download CSV File with Evaluation ID #$ansId[$i]", array('class'=>'btn btn-default')) }}
                        
                    </div>
                    </br>  

                    {{ Form::close() }}
                @endif
            @endfor  

               
    @endif


@stop