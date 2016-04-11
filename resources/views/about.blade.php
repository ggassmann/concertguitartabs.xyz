@extends('layouts.app')

@section('content')

    <script>
        $("#aboutTab").addClass("active")
    </script>
    <div class="panel panel-default" style="margin-left: 2rem; margin-right: 2rem;">
    	<div class="panel-body">
		    <h1>About this site</h1>

		    <p>
		    	Developer: Gavin Gassmann (<a target="_blank" href="http://www.gavingassmann.com">gavingassmann.com</a>) (<a href="mailto:gassmann.gavin@gmail.com">gassmann.gavin@gmail.com</a>)
		    </p>

		    <h3>Music Sources</h3>
		    <p>
		    	<a href="http://classtab.org" target="_blank">classtab.org</a>
		    </p>
		    <h3>Development Info</h3>
		    <p>
		    	Created with PHP and the <a href="https://laravel.com/" target="_blank">Laravel 5</a> framework.<br/>
		    	Hosted on a small Linux home server w/ Apache and MySQL<br/>
		    	Source availible on <a href="https://github.com/gigimoi/concertguitartabs" target="_blank">Github</a>
		    </p>
    	</div>
    </div>
@endsection