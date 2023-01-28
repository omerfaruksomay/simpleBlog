<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        for ($i=0;$i<7;$i++){
            $title=fake()->sentence();
            DB::table('articles')->insert([
               'category_id'=>rand(1,6),
                'title'=>$title,
                'index'=>fake()->paragraph(6),
                'slug'=>Str::slug($title),
                'created_at'=>fake()->dateTime('now'),
                'updated_at'=>now()
            ]);


        }*/
    }
}
