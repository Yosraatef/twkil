<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = [
        ['id'=>1,'parent_id'=>0,'section_id'=>1,'category_name'=>'T-shart','category_image'=>'','category_descount'=>0,'description'=>'vgchbdjnxlkjnhbgvhbjxnkzml','url'=>'T-shart','meta_title'=>'T-shart','meta_discription'=>'','meta_keywords'=>'','status'=>1],
        ['id'=>2,'parent_id'=>1,'section_id'=>1,'category_name'=>'casual T-shart','category_image'=>'','category_descount'=>0,'description'=>'vgchbdjnxlkjnhbgvhbjxnkzml','url'=>'T-shart','meta_title'=>'T-shart','meta_discription'=>'','meta_keywords'=>'','status'=>1],
        ['id'=>3,'parent_id'=>1,'section_id'=>1,'category_name'=>'formal T-shart','category_image'=>'','category_descount'=>0,'description'=>'vgchbdjnxlkjnhbgvhbjxnkzml','url'=>'T-shart','meta_title'=>'T-shart','meta_discription'=>'','meta_keywords'=>'','status'=>1],


      ];
      Category::insert($data);
    }
}
