@extends('layouts.app')

@section('content')

    @include('common.errors')

    @if ($is_adding_music)
        <script>
            $("#addMusicTab").addClass("active")
        </script>
        <div class="panel-body">
            <form action="{{ url('music') }}" method="POST" class="form-horizontal">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="passphrase" class="col-sm-3 control-label">Passphrase</label>

                    <div class="col-sm-6">
                        <input type="password" name="passphrase" id="passphrase" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="music-title" class="col-sm-3 control-label">Title</label>

                    <div class="col-sm-6">
                        <input type="text" name="title" id="music-title" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="composer-name" class="col-sm-3 control-label">Composer</label>

                    <div class="col-sm-6">
                        <input type="text" name="composer" id="composer-name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="midiurl" class="col-sm-3 control-label">MIDI URL</label>

                    <div class="col-sm-6">
                        <input type="text" name="midiurl" id="midiurl" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="videourls" class="col-sm-3 control-label">Video URLS (Delimit with a single space)</label>

                    <div class="col-sm-6">
                        <input type="text" name="videourls" id="videourls" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tab" class="col-sm-3 control-label">Tablature</label>

                    <div class="col-sm-6">
                        <textarea style="font-family:monospace;" class="form-control" name="tab" rows="5" id="tab"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Song
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif

    @if (!is_null($musics) and count($musics) > 0)
        <script>
            $("#homeTab").addClass("active")
        </script>
        <script src="//code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="/jquery_image_quickview.js"></script>
        <script type='text/javascript' src='http://www.midijs.net/lib/midi.js'></script>
        <link href="/jquery_image_quickview.css" rel="stylesheet" type="text/css">
        <script>
            var currentSong = ""
            var currentID = -1

            function getEndSongFunction(id, song) {
                return function() {
                    last_time = 0;
                    currentID = -1;
                    currentSong = -1;
                    $("#playMidiButton" + id).html("Play MIDI")
                    $("#playMidiButton" + id).removeClass("disabled");
                    $("#playMidiButton" + id).unbind('click').click(function() {
                        playmidi(id, song)
                    });
                    MIDIjs.stop();
                }
            }

            function midi_error_message(message) {
                if(message.startsWith("Playing:")) {
                    $("#playMidiButton" + currentID).removeClass("disabled");
                    $("#playMidiButton" + currentID).html("Stop Playing")
                    $("#playMidiButton" + currentID).unbind('click').click(
                        getEndSongFunction(currentID, currentSong)
                    );
                }
                console.log(message)
            }
            MIDIjs.message_callback = midi_error_message

            var last_time = 0;
            function check_time(ev) {
                 if(ev.time < last_time) {
                        getEndSongFunction(currentID, currentSong)()
                 }
                 last_time = ev.time;
            };
            MIDIjs.player_callback = check_time;

            function playmidi(id, song) {
                if(currentID != -1) {
                    getEndSongFunction(currentID, currentSong)()
                }
                currentSong = song
                currentID = id

                MIDIjs.play("/midi_file_" + song.replace("http://www.classtab.org/", ""));

                $("#playMidiButton" + id).html("Loading...");
                $("#playMidiButton" + id).addClass("disabled");

            }
        </script>

        <div class="panel panel-default">
            <?php
                srand(idate("z") + idate("Y") + idate("w") + idate("t") + idate("m") + idate("d"));
                $music_of_the_day = $musics->get(rand(0, $musics->count()));
                $composer_of_the_day = $musics->get(rand(0, $musics->count()))->composer;
                srand();
            ?>
            <div style="height: 1rem;"></div>
            <div>
                <div class="alert alert-info" role="alert" style="margin-left: 10rem; margin-right: 10rem;">
                    <h3>
                        Piece of the Day: 
                        <a class="alert-link" href="#musicTitle{{preg_replace('/[^a-zA-Z]+/', '', $music_of_the_day->title)}}" >
                            {{ $music_of_the_day->title }} by {{ $music_of_the_day->composer }}
                        </a>
                    </h3>
                </div>
                <div class="alert alert-info" role="alert" style="margin-left: 10rem; margin-right: 10rem;">
                    <h3>
                        Composer of the Day: 
                        <a class="alert-link" href="#musicTitle{{preg_replace('/[^a-zA-Z]+/', '', $composer_of_the_day)}}" >
                            {{ $composer_of_the_day }}
                        </a>
                    </h3>
                </div>
            </div>

            <div class="panel-body">
                <table class="table table-striped music-table" style="table-layout: fixed;">
                    <thead>
                        <th style="width:65%">Music</th>
                        <th>Tab</th>
                        <th>MIDI</th>
                        <th>Video(s)</th>
                    </thead>
                    <tbody>
                        <?php 
                            $current_composer = "";
                        ?>
                        @foreach ($musics as $music)
                            @if($current_composer != $music->composer)
                                <?php
                                    $current_composer = $music->composer;
                                ?>
                                <tr>
                                    <td id="musicTitle{{preg_replace('/[^a-zA-Z]+/', '', $music->composer)}}" style="background-color:#EEE" class="table-text" style="">
                                         <h2>{{ $music->composer }}</h2>
                                    </td>
                                    <td style="background-color:#EEE" ></td>
                                    <td style="background-color:#EEE" ></td>
                                    <td style="background-color:#EEE" ></td>
                                </tr>
                            @endif
                            <tr>
                                <td id="musicTitle{{preg_replace('/[^a-zA-Z]+/', '', $music->title)}}" style="text-align: right;" class="table-text">
                                    <div>
                                        {{ $music->title }}
                                    </div>
                                </td>
                                <td class="table-text">
                                    <a class="btn btn-primary" style="width: 100%;" href="/music/tab/{{$music->id}}">Tab</a>
                                </td>
                                <td>
                                    @if(strlen($music->midiurl) >= 1)
                                         <a id="playMidiButton{{$music->id}}" style="width: 100%;" class="btn btn-primary">Play MIDI</a>
                                         <script>
                                            $("#playMidiButton{{$music->id}}").click(function() {
                                                playmidi({{$music->id}}, '{{$music->midiurl}}');
                                            })
                                         </script>
                                     @else
                                        <a style="width: 100%;" class="btn btn-danger disabled">No MIDI</a>
                                     @endif
                                </td>
                                <td>
                                    @if(strlen($music->videourls) >= 1)
                                        <a class="btn btn-primary" style="width: 100%;" target="_blank" href="{{$music->videourls}}">Watch Video</a>
                                    @else
                                        <a style="width: 100%;" class="btn btn-danger disabled">No Videos</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection