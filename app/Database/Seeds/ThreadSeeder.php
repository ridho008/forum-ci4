<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ThreadSeeder extends Seeder
{
  public function run()
  {
         $faker = \Faker\Factory::create();

         for($i = 1; $i <= 50; $i++) {
             $data = [
                     'judul' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                     'isi'    => $faker->paragraph($nbSentences = 6, $variableNbSentences = true),
                     'id_kategori'    => rand(1,3),
                     'created_at'    => date('Y-m-d H:i:s'),
                     'created_by'    => 1
             ];
            $this->db->table('thread')->insert($data);

         }
  }
}