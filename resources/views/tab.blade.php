@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-body">
			<h1>{{$title}}</h1>
			<h3>By {{$composer}}</h3>
			<p style="font-family:monospace; line-height: 100%;">
				{!! nl2br(str_replace(' ', '&nbsp;', e($tab))); !!}
			</p>
		</div>
	</div>
@endsection