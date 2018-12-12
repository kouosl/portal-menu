<?php

use yii\db\Migration;

/**
 * Class m181212_145517_menu
 */
class m181212_145517_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
       public function safeUp()
    {
            $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'position' => $this->string(20)->notNull(),
        ],'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');

          


         $this->createTable('menu_items', [
            'id' => $this->primaryKey(),
            'label' => $this->string(20)->notNull(),
            'link' => $this->string(20)->notNull(),
            'target' => $this->string(20)->notNull(),
            'type' => $this->string(20)->notNull(),
            'parent' => $this->string(20)->notNull(),
            'menu_id' => $this->integer()->notNull(),
        ],'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');

         
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       

        $this->dropTable('menu');
        $this->dropTable('menu_items');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181212_145517_menu cannot be reverted.\n";

        return false;
    }
    */
}
