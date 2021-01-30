<?php

use App\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{

    public function run()
    {
        $name = ['Celeste','Hollow Knight','The Witcher 3','Cyberpunk 2077','Little Nightmares','Horizon Zero Dawn','ARK Survival Evolved',"No man's sky", 'Stardew Valley', 'Anno 1800', 'Satisfactory'];
        $price = ['14.90','9.90','14.90', '39.90', '9.90', '29.90', '34.90', '29.90', '7.90', '24.90', '19.90'];
        $image = [
            'https://i.imgur.com/emr4xiF.jpg',
            'https://i.imgur.com/ynfHhxc.png',
            'https://i.imgur.com/4WCuDci.png',
            'https://i.imgur.com/07nopOu.png',
            'https://i.imgur.com/SgRlByF.png',
            'https://i.imgur.com/WQdc1Zr.png',
            'https://i.imgur.com/DStaO2V.png',
            'https://i.imgur.com/fbCdxe4.png',
            'https://i.imgur.com/JMSz1K2.png',
            'https://i.imgur.com/ccEZHoj.jpg',
            'https://i.imgur.com/M7NQctV.jpg',   
        ];

        $description = [
            "Aidez Madeline à survivre à ses démons intérieurs au mont Celeste, dans ce jeu de plateformes ultra relevé, réalisé par les créateurs du classique TowerFall.",
            "Une aventure épique et pleine d’action, qui vous plongera dans un vaste royaume en ruine peuplé d’insectes et de héros.",
            "Alors que la guerre fait rage à travers les royaumes du Nord, vous acceptez le contrat de votre vie et partez à la recherche de l'enfant de la prophétie, une arme vivante capable de changer le monde.",
            "Vous incarnez V, mercenaire hors-la-loi à la recherche d’un implant unique qui serait la clé de l’immortalité...",
            "Aidez Six à s'échapper de l'Antre, un vaste et mystérieux vaisseau peuplé d'âmes corrompues en quête de leur prochain repas...",
            "Découvrez la quête légendaire d'Aloy et dévoilez les mystères d'un monde futur dominé par les machines.",
            "En tant qu'homme ou femme échoué nu, mourant de froid et de faim sur une île mystérieuse, vous devrez chasser, récolter, fabriquer des objets, faire pousser des plantes et construire des abris pour survivre.",
            "No Man's Sky est un jeu de science-fiction sur l'exploration et la survie dans un univers infini généré de manière dynamique.",
            "Vous avez hérité de la vieille ferme de votre grand-père dans la Stardew Valley. Armé d'outils artisanaux et de quelques pièces de monnaie, vous vous apprêtez à commencer votre nouvelle vie.",
            "Mettez vos talents de dirigeant à l'épreuve dans la construction de métropoles pour par la suite explorer et conquérir des terres nouvelles.",
            "Jouez seul ou entre amis, explorez une planète inconnue, construisez des usines à plusieurs niveaux et des tapis roulants à l’infini !",   
        ];

        for($i = 0; $i <= count($name)-1; $i++){
            $game = Game::create(
                [
                    'name' => $name[$i],
                    'description' => $description[$i],
                    'price' => $price[$i],
                    'grade' => rand(80,100)/10,
                    'quantity' => rand(1, 15),
                    'image' => $image[$i]
                ]);

            }
    }
}
