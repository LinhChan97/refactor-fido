<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Doctor;
use Illuminate\Support\Carbon;
use App\Patient;
use App\Mpdels\Employee;
use App\User;
use App\Admin;
use App\Certificate;
use App\Rating;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Employee::class, function (Faker $faker) {
    static $employee_number = 1;
    return [
        'name' => $faker->name,
        'status' => 'offline',
        'created_by_user' => $faker->numberBetween(1, 20),
        'employee_no' => 'NV' . $employee_number++,
        'avatar' => 'https://i.imgur.com/On6cerN.jpg',
        'birthday' => $faker->date($format = 'Y-m-d', $max = '1996'),
        'gender' => 'Male',
        'description' => $faker->text(200),
        'id_number' => $faker->numberBetween(10000000, 99999999),
        'id_number_place' => "Công an Thành Phố Đà Nẵng",
        'id_number_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'passport_no' => $faker->numberBetween(100000000, 99999999),
        'passport_place' => "Công an Thành Phố Đà Nẵng",
        'passport_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone_number' => $faker->numberBetween(0111111111, 999999999),
        'address_id' => $faker->numberBetween(1, 20),
        'address_details' => 'Đường Nguyễn Tất Thành, Hoà Khánh Bắc, Liên Chiểu',
        'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'tax_number' => 'DN:' . $faker->text($max = 100),
        'email' => $faker->email,
        'active_check' => 1,
    ];
});
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_status' => 'actived',
        'email' => $faker->email,
        'password' => bcrypt('linhtinh123'),
        'usable_id' => $faker->unique()->numberBetween(1, 20),
        'usable_type' => 'App\Employee',
    ];
});