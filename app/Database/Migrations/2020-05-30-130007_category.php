<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
	public function up()
	{
		//
		$this->db->disableForeignKeyChecks();

		$this->forge->addField([
					'id'          => [
							'type'           => 'BIGINT',
							'unsigned'       => TRUE,
							'auto_increment' => TRUE
					],
					'name'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '200',
							'unique'         => TRUE
					],
					'parent_id' => [
							'type'           => 'BIGINT',
							'unsigned'       => TRUE,
							'null'           => TRUE,
					],
			]);

		$this->forge->addKey('id', TRUE);


		$this->forge->addForeignKey('parent_id','categories','id','CASCADE','CASCADE');

		$this->forge->createTable('categories');


		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('categories');

	}
}
