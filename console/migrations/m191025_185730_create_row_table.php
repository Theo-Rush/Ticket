<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%row}}`.
 */
class m191025_185730_create_row_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%row}}', [
            'id' => $this->primaryKey(),
            'seats_quantity' => $this->integer(),
            'price_coef' => $this->float()->defaultValue(1.0),
            'theater_id' => $this->integer()
        ]);

        $this->addForeignKey(
            '{{%fk-row-theater_id}}', '{{%row}}', 'theater_id', '{{%theater}}', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropForeignKey(
            '{{%fk-row-theater_id}}', '{{%row}}'
        );
        
        $this->dropTable('{{%row}}');
    }

}
