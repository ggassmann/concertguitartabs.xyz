@extends('layouts.app')

@section('content')

    <script>
        $("#readingGuitarTab").addClass("active")
    </script>
    <div class="panel panel-default" style="margin-left: 2rem; margin-right: 2rem;">
    	<div class="panel-body">
		    <h1>A comprehensive guide to reading guitar tablature</h1>
		    <p>
		    	Reading guitar tablature can be daunting for new classical guitarists, especially since tablature is not at all standardized. This guide will help you understand all of the elements of Guitar Tablature.
		    </p>
		    <h3>Basics</h3>
		    <p>
		    	Tablature is a form of sheet music optimized for plaintext representation and fretted instruments.<br/>
		    	Tablature introduces some new symbols as well as making use of tried and true standard sheet music symbols. <br/>
		    </p>
		    <div class="panel panel-default">
		    	<div class="panel-heading">Staff</div>
		    	<div class="panel-body">
		    		<p style="font-family:monospace; line-height: 120%;">
			    		This is one measure of staff<br/><br/>
			    		|------------------------|<br/>
						|------------------------|<br/>
						|------------------------|<br/>
						|------------------------|<br/>
						|------------------------|<br/>
						|------------------------|<br/><br/>
						It has six lines, one for each string on a guitar. <br/>
						The string on the bottom is the lowest string, or the largest and closest to you string on the guitar.<br/>
						You read the staff from left to right.
			    	</p>
		    	</div>
		    </div>
		    <div class="panel panel-default">
		    	<div class="panel-heading">Tuning</div>
		    	<div class="panel-body">
		    		<p style="font-family:monospace; line-height: 120%;">
			    		Sometimes, tuning is specified before the tab like so:<br/><br/>
				    	Tuning: EADGBE<br/><br/>
				    	This shows the notes that your strings should be tuned to from bottom to top. Sometimes the last e will be lowercase because it is higher than the low E.<br/><br/>
				    	Other times tuning is shown on the left of the first staff like so<br/><br/>
				    	e:|<br/>
				    	B:|<br/>
				    	G:|<br/>
				    	D:|<br/>
				    	A:|<br/>
				    	E:|<br/>
				    	<br/>
				    	This shows the notes your strings should be tuned to from lowest to highest from bottom to top.<br/><br/>
				    	EADGBE is Standard Guitar Tuning<br/>
				    	DADGBE is Drop D Tuning<br/>
				    	CGCFAD is Drop C Tuning<br/>
				    	DADGAD is common in Celtic music<br/>
				    	EADF♯BE is Renaissance Lute tuning<br/>
				    	Many other tunings exist, but those are the 5 most common.<br/>
			    	</p>
		    	</div>
		    </div>
		    <div class="panel panel-default">
		    	<div class="panel-heading">Simple Notes</div>
		    	<div class="panel-body">
		    		<p style="font-family:monospace; line-height: 120%;">
		    			Part of smoke on the water: <br/><br/>
				    	e:|------------------------|<br/>
				    	B:|------------------------|<br/>
				    	G:|------------------------|<br/>
				    	D:|------------------------|<br/>
				    	A:|------------------------|<br/>
				    	E:|--0--3--5----0--3--6-5--|<br/><br/>
				    	Each number represents which fret you press down with your left hand (or right hand on left handed guitars)<br/>
				    	A zero represents that you should play the string "open", or without pressing at all.<br/>
				    	All of these notes are played on your largest and closest to your eyes string<br/>
				    	For standard music readers, each fret is one half step<br/><br/>
				    	Here's a D Major chord in tablature<br/><br/>
				    	e:|---2--------------------|<br/>
				    	B:|---3--------------------|<br/>
				    	G:|---2--------------------|<br/>
				    	D:|---0--------------------|<br/>
				    	A:|------------------------|<br/>
				    	E:|------------------------|<br/><br/>
			    	</p>
		    	</div>
		    </div>
		    <div class="panel panel-default">
		    	<div class="panel-heading">Tablature Symbols</div>
		    	<div class="panel-body">
		    		<div class="panel panel-default">
		    			<div class="panel-heading">Slide/Glissando</div>
		    			<div class="panel-body">
				    		<p style="font-family:monospace; line-height: 120%;">
						    	e:|------------------------|<br/>
						    	B:|------------------------|<br/>
						    	G:|--------7/9-------------|<br/>
						    	D:|-----5/7----------------|<br/>
						    	A:|--3/5-------------------|<br/>
						    	E:|------------------------|<br/><br/>
						    	A slide or Glissando is when you drag your finger from one fret to another, creating a sliding sound.<br/>
						    	You pluck the first note with your finger but not the one you arrive at<br/>
						    	The slide or glissando is denoted by a /, Downwards slides are denoted by a \<br/><br/>
						    	Sometimes there are multiple /'s to signify that the slide should last a certain amount of time<br/>
						    	e:|------------------------|<br/>
						    	B:|------------------------|<br/>
						    	G:|------------------------|<br/>
						    	D:|------------------------|<br/>
						    	A:|--3////////5------------|<br/>
						    	E:|------------------------|<br/><br/>
						    	We'll learn about timing in tablature later because it's a tricky topic<br/><br/>
					    	</p>
		    			</div>
		    		</div>
		    		<div class="panel panel-default">
		    			<div class="panel-heading">Hammer-on and pull-off</div>
		    			<div class="panel-body">
				    		<p style="font-family:monospace; line-height: 120%;">
				    			Hammer-on<br/><br/>
						    	e:|------------------------|<br/>
						    	B:|------------------------|<br/>
						    	G:|--------7h9-------------|<br/>
						    	D:|-----5h7----------------|<br/>
						    	A:|--3h5-------------------|<br/>
						    	E:|------------------------|<br/><br/>
						    	A Hammer-on is when you pluck the first note and then press your finger down on another note without plucking again.<br/>
						    	It's denoted by an 'h'<br/><br/>
						    	Pull-off<br/><br/>
						    	e:|------------------------|<br/>
						    	B:|------------------------|<br/>
						    	G:|------------------------|<br/>
						    	D:|------------------------|<br/>
						    	A:|--5p3-5p3---------------|<br/>
						    	E:|------------------------|<br/><br/>
						    	A pull off is when you pluck one note with your finger and have another finger in place so that you can release the first note and then have the second note already pressed. <br/>This causes the note to change without plucking again.<br/>
						    	It's denoted by a 'p'
					    	</p>
		    			</div>
		    		</div>
		    	</div>
		    </div>
		    <div class="panel panel-default">
		    	<div class="panel-heading">Timing</div>
		    	<div class="panel-body">
		    		<p style="font-family:monospace; line-height: 120%;">
		    			Timing is one of the most difficult parts of Tablature and its primary downfall in comparison to standard sheet music.<br/>
		    			One reason is that creating timed tablature is hard, and the tabber has better things to do (Such as creating more tabs)<br/>
		    			There are quite a few different timing setups that you'll come across, we'll start with the worst case and move to the best case.<br/>
			    	</p>
		    		<div class="panel panel-default">
		    			<div class="panel-heading">Spacing Based Timing / No Timing</div>
		    			<div class="panel-body">
		    				<p style="font-family:monospace; line-height: 120%;">
								E|--------------------------|---------------------|------------------------|<br/>
								B|-----3-----1-----0--------|-----------1----1----|--1----0-----0--1--3----|<br/>
								G|--1-----2--------------1--|--2------------------|----------2-------------|<br/>
								D|--2-----------0-----2-----|--2--------2----2----|--0----------0----------|<br/>
								A|--------------------------|--0--------0---------|------------------------|<br/>
								E|--------------------------|----------------3----|--2----------2----------|<br/><br/>
								(From <a href="/music/tab/191" target="_blank">BWV 1012 - Gavottes I and II - Cello Suite No 6 in D
 by Johann Sebastian Bach</a>)<br/><br/>
								This method of denoting time is a nightmare when you don't know the piece you're about to play. Luckily, it's not common in classical music.<br/>
								When sight reading, you sort of need to guess the timing based on how many -'s there are between each note - as well as how many notes are in each line.<br/>
					    	</p>
		    			</div>
		    		</div>
		    	</div>
		    </div>
	    </div>
    </div>
@endsection