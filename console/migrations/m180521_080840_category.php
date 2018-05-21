<?php

use yii\db\Migration;

/**
 * Class m180521_080840_category
 */
class m180521_080840_category extends Migration
{
    /**
     * {@inheritdoc}
     */
//    public function safeUp()
//    {
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m180521_080840_category cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'slug' => $this->string(100),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()

        ]);
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200),
            'description' => $this->text(),
            'cate_id' => $this->integer(4)->notNull()
        ]);
        $this->addForeignKey('FK_post_cate', 'posts', 'cate_id', 'categories', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('FK_post_cate', 'posts');
        $this->dropTable('posts');
        $this->dropTable('categories');
    }

}
