<?php

use Illuminate\Database\Seeder;

class SpendingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Spending::class, 30)->create()->each(function($spending){
            $users = App\User::pluck('id')->shuffle()->all();

            //var_dump($users);

            if($spending->price > 1000){

                $number_of = mt_rand(1, count($users));
                var_dump($number_of);
                $array_selected = array_random($users,$number_of);
                $part = round($spending->price / $number_of, 2);
            }
            else{
                $array_selected = array_random($users,1);
                $part = $spending->price;
            }


                foreach ($array_selected as $index=>$oneuser){

                    App\Spending::find($spending->id)->users()->attach([$oneuser],['price'=> $part]);
                }

    });
    }
}
