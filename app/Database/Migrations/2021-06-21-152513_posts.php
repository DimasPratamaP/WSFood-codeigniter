<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'users_id' => [
				'type'       => 'INT',
				'constraint'     => 5,
				'unsigned'   => true,
				'null'       => true
			],
			'judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'image'    => [
				'type'           => 'VARCHAR',
				'constraint'     => '250',
			],
			'deskripsi'    => [
				'type'           => 'VARCHAR',
				'constraint'     => '250',
        	],
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('users_id', 'users', 'id');
		$this->forge->createTable('posts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
