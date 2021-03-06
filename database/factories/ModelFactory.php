<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $file = file_get_contents('./public/uploads/users/users.json', true);
    $data = json_decode($file, true);

//    foreach ($data['users']['terminal'] as $d_key => $d_val)
//    {
        return [
//            'username'      => $d_val['username'],
            'username'      => 'Steve',
            'password'      => Hash::make('pass'),
            'role'          => 'premiere',
            'remember_token'=> str_random(10),
        ];
//    }

});
        
$factory->define(App\Post::class, function (Faker\Generator $faker) {

    $dirUpload = public_path(env('UPLOAD_PICTURE', 'uploads'.DIRECTORY_SEPARATOR.'images'));
    
    $files = File::allFiles($dirUpload);
    
    $uri = str_random(10).'_370x235.jpg';
    $id = rand(1,9);
    $fileName = file_get_contents("http://lorempicsum.com/futurama/370/235/$id");
    $fileLocal = $dirUpload.DIRECTORY_SEPARATOR.$uri;
    
    File::put(
        $fileLocal, $fileName
    );
    
    return [
        'user_id'       => rand(1, 1),
        'title'         => $faker->title,
        'abstract'      => $faker->paragraph(2),
        'content'       => $faker->paragraph(5),
        'url_thumbnail' => $uri,
        'status'        => $faker->boolean,
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id'       => rand(1, 30),
        'title'         => $faker->title,
        'content'       => $faker->paragraph(2),
        'status'        => $faker->boolean,
    ];
});
