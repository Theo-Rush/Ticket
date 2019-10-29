<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film}}`.
 */
class m191025_185806_create_film_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'basic_price' => $this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('{{%film}}');
    }

}
