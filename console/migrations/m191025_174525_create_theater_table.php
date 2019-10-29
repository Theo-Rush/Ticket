<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%theater}}`.
 */
class m191025_174525_create_theater_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%theater}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'time' => $this->time()->notNull(),
            'film' => $this->string(),
        ]);

        $this->addForeignKey(
            '{{%fk-theater-film_id}}', '{{%theater}}', 'film', '{{%film}}', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropForeignKey(
            '{{%fk-theater-film_id}}', '{{$theater}}', 'film'
        );

        $this->dropTable('{{%theater}}');
    }

}
