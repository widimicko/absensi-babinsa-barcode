<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $data = [
          [
            'name' => 'Member 1',
            'image' => 'empty_image.jpg',
            'rank' => 'Sersan',
            'credential' => md5(uniqid(rand(), true)),
            'birthdate' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'name' => 'Member 2',
            'image' => 'empty_image.jpg',
            'rank' => 'Sersan',
            'credential' => md5(uniqid(rand(), true)),
            'birthdate' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'name' => 'Member 3',
            'image' => 'empty_image.jpg',
            'rank' => 'Sersan',
            'credential' => md5(uniqid(rand(), true)),
            'birthdate' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'name' => 'Member 4',
            'image' => 'empty_image.jpg',
            'rank' => 'Sersan',
            'credential' => md5(uniqid(rand(), true)),
            'birthdate' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
          [
            'name' => 'Member 5',
            'image' => 'empty_image.jpg',
            'rank' => 'Sersan',
            'credential' => md5(uniqid(rand(), true)),
            'birthdate' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
          ],
        ];

        $this->db->table('members')->insertBatch($data);
    }
}