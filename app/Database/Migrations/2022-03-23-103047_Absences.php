<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Absences extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'member_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'absence' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'date' => [
                'type' => 'date',
            ],
            'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('member_id', 'members', 'id', 'CASCADE', '');
        $this->forge->createTable('absences');
    }

    public function down()
    {
        $this->forge->dropTable('absences');
    }
}
