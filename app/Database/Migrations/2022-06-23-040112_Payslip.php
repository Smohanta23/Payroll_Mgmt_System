<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payslip extends Migration
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
            'payroll_id' => [
                'type'           => 'INT',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'employee_id' => [
                'type'           => 'INT',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'salary' => [
                'type'       => 'FLOAT',
                'constraint' => '12,2',
                'default'    => 0
            ],
            'present' => [
                'type'       => 'FLOAT',
                'constraint' => '12,2',
                'default'    => 0
            ],
            'late_undertime' => [
                'type'       => 'FLOAT',
                'constraint' => '12,2',
                'default'    => 0
            ],
            'witholding_tax' => [
                'type'       => 'FLOAT',
                'constraint' => '12,2',
                'default'    => 0
            ],
            'net' => [
                'type'       => 'FLOAT',
                'constraint' => '12,2',
                'default'    => 0
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('payroll_id');
        $this->forge->addKey('employee_id');
        $this->forge->addForeignKey('payroll_id', 'payrolls', 'id','NO ACTION','CASCADE');
        $this->forge->addForeignKey('employee_id', 'employees', 'id','NO ACTION','CASCADE');
        $this->forge->createTable('payslips');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('payslips');
    }
}
