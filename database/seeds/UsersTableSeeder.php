<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{

    protected $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function ($user){
            $file = file_get_contents('http://lorempicsum.com/futurama/250/250/'. rand(1,9));
            $link = str_random(12) . '.jpg';

            File::put(
                public_path('img') . '/' . $link, $file
            );

            $user->picture()->create([
                'name'=> $user->name,
                'link'=>$link,
            ]);
            /*
            $started = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2017-05-12 22:20:00')->toDateTimeString();
            $ended = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2017-08-24 22:20:00')->toDateTimeString();

// pour calculer la différence en jours entre deux dates :

            $s = \Carbon\Carbon::parse($started);
            $e = \Carbon\Carbon::parse($ended);*/

            //$days = $s->diffInDays($e); // donne le nombre de jour(s)


            $user->part()->create([
                'day' => 15,
                'started' => $this->faker->dateTime(),
                'ended' => $this->faker->dateTimeBetween('-15 days', 'now'),
            ]);
        });

    }
}
