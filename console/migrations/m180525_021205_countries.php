<?php

use yii\db\Migration;

/**
 * Class m180525_021205_countries
 */
class m180525_021205_countries extends Migration
{
    /**
     * {@inheritdoc}
     */


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('countries', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'zipcode' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable('countries');
    }
}
