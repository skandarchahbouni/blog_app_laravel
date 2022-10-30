<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag; 

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["Laravel", "Python", "Vue", "Php", "React js", "Bootstrap", "Node js", "Flutter", "Dart", "Javascript"];
        foreach ($tags as $tag) {
            Tag::create(["name" => $tag])->gigs()->attach(rand(1, 10));
        }
    }
}
