<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employee extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 30,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'department_id' => [
                'type'           => 'INT',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'designation_id' => [
                'type'           => 'INT',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'code' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'middle_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'default' => '',
                'null' => true,
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'dob' => [
                'type'       => 'DATE'
            ],
            'gender' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'date_hired' => [
                'type'       => 'DATE'
            ],
            'salary' => [
                'type'       => 'FLOAT',
                'constraint' => '12,2',
                'default'    => 0
            ],
            'status' => [
                'type'       => 'TINYINT',
                'constraint' => '1',
                'default'    => 1
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('department_id');
        $this->forge->addKey('designation_id');
        $this->forge->addForeignKey('department_id', 'departments', 'id','NO ACTION','CASCADE');
        $this->forge->addForeignKey('designation_id', 'designations', 'id','NO ACTION','CASCADE');
        $this->forge->createTable('employees');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
