<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) { 
            $project = new Project();
            $project->title = $faker->sentence();
            $project->slug = Str::slug($project->title, "-");
            $project->image = $faker->imageUrl(600, 300, 'Project', false, false);
            $project->content = $faker->text();
            $project->save();
        }
    }
}
