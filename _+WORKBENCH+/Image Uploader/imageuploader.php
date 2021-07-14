<?php
$input = Input::all();
$file = array_get($input, 'image');
$destinationPath = public_path('images');
$filename = $request->image->getClientOriginalName();
$imageResize = Image::make($file->getRealPath())->resize(50,50, function($c){
	$c->aspectRatio();
	$c->upsize();
})->save($destinationPath.'/'.$filename);
$filepath = $destinationPath.'/'.$path;
$insert = array('username' => Input::get('username'), 'image' => $filepath,);

DB::table('users')->insert($insert);






// routes
// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
?>