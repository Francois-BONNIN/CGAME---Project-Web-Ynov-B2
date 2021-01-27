<?php

use App\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{

    public function run()
    {
        $name = ['Celeste','Hollow Knight','The Witcher 3','Cloudpunk','Little Nightmares','Katana Zero','ARK Survival',"No man's sky", 'Stardew Valley', 'Anno 1800', 'Satisfactory'];
        $price = ['15','10','15', '15', '10', '10', '35', '30', '8', '25', '20'];
        for($i = 0; $i <= count($name)-1; $i++){
            $game = Game::create(
                [
                    'name' => $name[$i],
                    'price' => $price[$i],
                    'grade' => rand(35,50)/10,
                    'quantity' => rand(1, 15)
                ]);

            }
    }
}
