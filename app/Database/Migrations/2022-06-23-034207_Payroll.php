<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payroll extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'code' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'from_date' => [
                'type'       => 'DATE',
            ],
            'to_date' => [
                'type'       => 'DATE',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('payrolls');
    }

    public function down()
    {
        $this->forge->dropTable('payrolls');

    }
}
