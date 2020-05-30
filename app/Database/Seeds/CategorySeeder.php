<?php namespace App\Database\Seeds;

class CategorySeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
              
                $parents = range(1,6);
                // main category
                foreach($parents as $key){
                        
                    $data = [
                        "name"  => "main_$key"
                    ];
                    $this->db->table('categories')->insert($data);
                }

                // sub category level 1
                foreach(range(1,10) as $key){
                   $parent_id = $parents[ array_rand($parents, 1) ];    
                    $data = [
                        "name"           => $parent_id."_subCategroy_".$key,
                        "parent_id"      => $parent_id

                    ];
                    $this->db->table('categories')->insert($data);
                }
                
                $sub_categories = range(7,17);

                // sub category level 1
                foreach(range(1,10) as $key){
                     $parent_id = $sub_categories[ array_rand($sub_categories) ];    
                     $data = [
                         "name"           => $parent_id."_sub_subCategroy_".$key,
                         "parent_id"      => $parent_id
 
                     ];
                     $this->db->table('categories')->insert($data);
                 }
                

                
        }
}