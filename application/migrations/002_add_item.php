<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_item extends CI_Migration {


    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 9,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'category_id' => array(
                'type' => 'INT',
                'constraint' => '9',
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
//                'default' => `CURRENT_TIMESTAMP`,
            ),
            'status' => array(
                'type' => 'INT',
                'constraint' => '1',
                'default' => 0,
            ),
        ));
//        $this->dbforge->add_foreign_key(array('field' => 'category_id',
//                'foreign_table' => 'category',
//                'foreign_field' => 'id'));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('item');

    }

    public function down()
    {
        $this->dbforge->drop_table('item');
    }
}