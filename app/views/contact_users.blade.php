@extends('layouts.master')
<!--This is for the admin to send an email to all users in the database -->
@section('title')
@parent
@stop
@section('styles')

@stop

@section('header')
Send An Email To All Users
@stop

{{--This allows a view to override the--}}
{{--main div's class value--}}
@section('container_class_value')
<?php $containerClass="XSmallWhite container"; ?>
@show

@section('content')
@include('submit_confirm')

<html>
<body>
<!-- Blade Template engine -->
 {{ Form:: open(array('url' => 'contact_users')) }} <!--contact_request is a router from Route class-->

  <!-- Post message if successfully sent email -->
        @if (Session::get('screenC'))
            <div class = "alert alert-success"> {{ Session::get('screenC') }} 
                <a class="close" data-dismiss="alert">×</a>
            </div>
         @endif
    <div class="form-group">
            <ul class="errors">
                @foreach($errors->all('<li>:message</li>') as $message)
                {{ $message }}
                @endforeach
            </ul>
<!--
            {{ Form:: label ('first_name', 'First Name*' )}}<br />
            {{ Form:: text ('first_name', '', array('placeholder' => 'John')) }}
<br />
            {{ Form:: label ('last_name', 'Last Name*' )}}<br />
            {{ Form:: text ('last_name', '', array('placeholder' => 'Doe')) }}
<br />
            {{ Form:: label ('email', 'E-mail Address*') }}<br />
            {{ Form:: email ('email', '', array('placeholder' => 'me@example.com')) }}
<br /> 
-->
            {{ Form:: label ('message', 'Message*' )}}<br />
              <div class="form-group col-centered">                  
            {{ Form::textarea('message', '', array('class' => 'col-xs-12','placeholder' => 'Enter the message you wish to send here.'))}}                
            </div>
            <b>*</b> <i>Indicates Required Field</i>
            
<br />
<br />

            {{ Form::reset('Clear', array('class' => 'btn cc-btn-primary')) }}
            {{-- Form::submit('Send To All Users', array('class' => 'btn cc-btn-primary'))--}}
        {{ Form::submit('Send To All Users', array('class'=>'btn cc-btn-primary', 'data-toggle' => "modal", 'data-target'=> "#confirmSend", 'data-title'=>"Confirm Email",
                                      'data-message'=>'Are you sure you want to send an email to all users? This will take a few seconds...', 'data-placement'=>'top', 'title' => 'Send Email')) }}


            {{ Form:: close() }}
</div>            
</body>
</html>
@stop