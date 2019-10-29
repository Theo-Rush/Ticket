<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%purchased_ticket}}`.
 */
class m191025_185749_create_purchased_ticket_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%purchased_ticket}}', [
            'id' => $this->primaryKey(),
            'row' => $this->integer()->notNull(),
            'seat' => $this->integer()->notNull(),
            'reserve_type' => $this->integer()->notNull(),
            'reserve_fee' => $this->float()->defaultValue(0),
            'paid_at' => $this->dateTime()
        ]);

        $this->addForeignKey(
            '{{%fk-purchased_ticket-row_id}}', 'purchased_ticket', 'row', 'row', 'id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropForeignKey(
            '{{%purchased_ticket-row_id}}', '{{%purchased_ticket}}'
        );

        $this->dropTable('{{%purchased_ticket}}');
    }

}
