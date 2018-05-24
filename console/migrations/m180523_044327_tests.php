<?php

use yii\db\Migration;

/**
 * Class m180523_044327_tests
 */
class m180523_044327_tests extends Migration
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

        $this->createTable('tests', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
            'upload' => $this->string(255),
            'cate_id' => $this->integer(4)->notNull(),
        ]);
        $this->addForeignKey('FK_test_cate', 'tests', 'cate_id', 'categories', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_test_cate', 'test');
        $this->dropTable('test');
    }
}
