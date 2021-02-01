<?php

use Illuminate\Database\Seeder;
use App\Section;
class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          ['id'=>1,'name'=>'Men','status'=>1],
          ['id'=>2,'name'=>'women','status'=>1],
          ['id'=>3,'name'=>'Kids','status'=>1],
        ];
        Section::insert($data);
    }
}
