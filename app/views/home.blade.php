@extends('layouts.master')

@section('title')
@parent
@stop
@section('styles')

@stop
@section('header')
<h1>Capstone Connect</h1>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@stop
@section('content')


<div class="BigWhite">
 <div class="Announcements">

 <h>
 Announcements
 </h>
<div class="InsideAnnouncement">
  <h>
  Here
  </h>
  </div>
 </div>
  
<div class="RecentActivity">
<h>
Recent Activity
</h>
<div class="InsideRecentActivity">
<h>
Activity here!
</h>
</div>
 </div>
 <div class="Calendar">
<iframe src="https://www.google.com/calendar/embed?src=seanfrankett%40gmail.com&ctz=America/New_York" style="border: 20" width="490" height="320" frameborder="0" scrolling="no"></iframe>
<h>
Calendar
</h>
 </div>

</div>  


@stop