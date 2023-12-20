<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PayslipEarnings extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'payslip_id' => [
                'type'           => 'INT',
                'constraint'     => 30,
                'unsigned'       => true,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 250,
            ],
            'amount' => [
                'type'       => 'FLOAT',
                'constraint' => '12,2',
                'default'    => 0
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('payslip_id');
        $this->forge->addForeignKey('payslip_id', 'payslips', 'id','NO ACTION','CASCADE');
        $this->forge->createTable('payroll_earnings');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('payroll_earnings');
    }
}
