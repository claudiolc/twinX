<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m201021_144546_add_tipo_usuario_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'tipo_usuario', "ENUM('SUPERUSUARIO','GESTOR','ESTUDIANTE','TUTOR')");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'tipo_usuario');
    }
}
