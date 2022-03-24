<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AbsenceSeeder extends Seeder
{
    public function run()
    {
        $data = [
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'member_id' => rand(1, 5),
            'absence' => 'Masuk',
            'date' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
        ];

        $this->db->table('absences')->insertBatch($data);
    }
}