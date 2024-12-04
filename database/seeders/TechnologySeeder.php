<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFilePath = public_path('json/technologies.json');
        if (!file_exists($jsonFilePath)) {
            throw new \Exception('Arquivo technologies.json não encontrado.');
        }
        $jsonContent = file_get_contents($jsonFilePath);
        $technologies = json_decode($jsonContent, true)['technologies'];

        foreach ($technologies as $technologyData) {
            Technology::firstOrCreate(
                ['name' => $technologyData['name']],
                [
                    'category' => $technologyData['category'],
                    'icon_path' => $technologyData['icon_path'],
                ]
            );
        }
    }
}
