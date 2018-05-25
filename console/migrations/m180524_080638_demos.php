<?php

use yii\db\Migration;

/**
 * Class m180524_080638_demos
 */
class m180524_080638_demos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('demos', [
            'id' => $this->primaryKey(),
            'title' => $this->string('255'),
            'content' => $this->text(),
            'cate_id' => $this->integer(4)->notNull(),
        ]);
        $this->addForeignKey('FK_demos_cate', 'tests', 'cate_id', 'categories', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_demos_cate', 'demos');
        $this->dropTable('demos');
    }
}
