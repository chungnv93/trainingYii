<?php

use yii\db\Migration;

/**
 * Class m180522_090330_comments
 */
class m180522_090330_comments extends Migration
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
//        echo "m180522_090330_comments cannot be reverted.\n";
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

        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
            'post_id' => $this->integer(4)->notNull(),
            'user_id' => $this->integer(4)->notNull()
        ]);
        $this->addForeignKey('FK_comment_post', 'comments', 'post_id', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_comment_user', 'comments', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_comment_post', 'comments');
        $this->dropForeignKey('FK_comment_user', 'comments');
        $this->dropTable('comments');
    }

}
