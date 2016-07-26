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
    return [
        'username'      => $faker->userName,
        'password'      => bcrypt(str_random(10)),
        'role'          => $faker->word,
        'remember_token'=> str_random(10),
    ];
});
        
$factory->define(App\Post::class, function (Faker\Generator $faker) {

    $dirUpload = public_path(env('UPLOAD_PICTURE', 'uploads'));
    $files = File::allFiles($dirUpload);
    foreach($files as $file) {
        File::delete($file);
    }
    $uri = str_random(10).'_370x235.jpg';
    $id = rand(1,9);
    $fileName = file_get_contents("http://lorempicsum.com/futurama/370/235/$id");
    $fileLocal = $dirUpload.DIRECTORY_SEPARATOR.$uri;
    
    File::put(
        $fileLocal, $fileName
    );
    
    return [
        'user_id'       => rand(1, 6),
        'title'         => $faker->title,
        'abstract'      => $faker->paragraph(2),
        'content'       => $faker->paragraph(5),
        'url_thumbnail' => $uri,
        'status'        => $faker->boolean,
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'title'         => $faker->title,
        'content'       => $faker->paragraph(2),
        'status'        => rand(1, 2),
    ];
});
