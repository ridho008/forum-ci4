<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RatingSeeder extends Seeder
{
  public function run()
  {
         for($i = 1; $i <= 50; $i++) {
             $data = [
                     'id_thread' => rand(1,50),
                     'id_user'    => rand(1, 3),
                     'star'    => rand(1,5)
             ];
            $this->db->table('rating')->insert($data);

         }
  }
}