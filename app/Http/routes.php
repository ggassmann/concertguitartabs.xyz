<?php

use App\Music;
use Illuminate\Http\Request;

Route::group(['middleware' => 'web'], function() {
	Route::get('/', function() {
		$musics = Music::orderBy('composer', 'asc')->get();

		foreach ($musics as $music => $val) {
			if(strlen($val->midiurl) > 0) {
				$midifilename = "midi_file_" . substr(str_replace("http:", "", str_replace("www.classtab.org/", "", $val->midiurl)), 2);
				if(!file_exists($midifilename)) {
					$ch = curl_init($val->midiurl);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

					$data = curl_exec($ch);

					curl_close($ch);

					file_put_contents($midifilename, $data);
				}
			}
		}

		return view('music', [
			'is_adding_music' => false,
			'musics' => $musics
		]);
	});
	Route::get('/music/tab/{music}', function(Music $music) {
		return view('tab', [
			'title' => 		$music->title,
			'composer' => 	$music->composer,
			'tab' => 		$music->tab,
			'midiurl' =>    $music->midiurl,
		]);
	});
	Route::get('/about', function() {
		return view('about');
	});
	Route::get('/addmusic', function() {
		return view('music', [
			'is_adding_music' => true,
			'musics' => array()
		]);
	});
	Route::post('/music', function(Request $request) {
	    $validator = Validator::make($request->all(), [
	        'title'      => 'required|max:255',
	        'composer'   => 'required|max:255',
	        'tab'        => 'required',
	    ]);
	    if(strcmp(trim(DB::table('passphrases')->where('name', 'addsong')->pluck('passphrase')[0]), trim($request->passphrase)) !== 0) {
	    	return redirect('/');
	    }

	    if ($validator->fails()) {
	        return redirect('/')
	            ->withInput()
	            ->withErrors($validator);
	    }

	    $music = new Music;
	    $music->title = $request->title;
	    $music->composer = $request->composer;
	    $music->tab = $request->tab;
	    $music->midiurl = $request->midiurl;
	    $music->videourls = $request->videourls;
	    $music->save();

	    return redirect('/');
	});
	Route::delete('/music/{music}', function (Music $music) {
	    $music->delete();

	    return redirect('/');
	});
});