<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admon_out".
 *
 * @property int $id
 * @property string|null $nombre_coord
 * @property string|null $cargo_coord
 * @property string|null $email_coord
 * @property string|null $tlf_coord
 * @property string|null $address_coord Por defecto igual que la de la universidad
 * @property string|null $web_inf_acad
 * @property string|null $nombre_admon_in
 * @property string|null $cargo_admon_in
 * @property string|null $mail_admon_in
 * @property string|null $nombre_resp_acad_in
 * @property string|null $cargo_resp_acad_in
 * @property string|null $nombre_admon_out
 * @property string|null $cargo_admon_out
 * @property string|null $mail_admon_out
 * @property string|null $nombre_resp_acad_out
 * @property string|null $cargo_resp_acad_out
 * @property string|null $mail_resp_acad_out
 *
 * @property Convenio[] $convenios
 */
class AdmonOut extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admon_out';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_coord', 'cargo_coord', 'email_coord', 'tlf_coord', 'address_coord', 'web_inf_acad', 'nombre_admon_in', 'cargo_admon_in', 'mail_admon_in', 'nombre_resp_acad_in', 'cargo_resp_acad_in', 'nombre_admon_out', 'cargo_admon_out', 'mail_admon_out', 'nombre_resp_acad_out', 'cargo_resp_acad_out', 'mail_resp_acad_out'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_coord' => 'Nombre Coord',
            'cargo_coord' => 'Cargo Coord',
            'email_coord' => 'Email Coord',
            'tlf_coord' => 'Tlf Coord',
            'address_coord' => 'Address Coord',
            'web_inf_acad' => 'Web Inf Acad',
            'nombre_admon_in' => 'Nombre Admon In',
            'cargo_admon_in' => 'Cargo Admon In',
            'mail_admon_in' => 'Mail Admon In',
            'nombre_resp_acad_in' => 'Nombre Resp Acad In',
            'cargo_resp_acad_in' => 'Cargo Resp Acad In',
            'nombre_admon_out' => 'Nombre Admon Out',
            'cargo_admon_out' => 'Cargo Admon Out',
            'mail_admon_out' => 'Mail Admon Out',
            'nombre_resp_acad_out' => 'Nombre Resp Acad Out',
            'cargo_resp_acad_out' => 'Cargo Resp Acad Out',
            'mail_resp_acad_out' => 'Mail Resp Acad Out',
        ];
    }

    /**
     * Gets query for [[Convenios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConvenioQuery
     */
    public function getConvenios()
    {
        return $this->hasMany(Convenio::className(), ['id_admon_out' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AdmonOutQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AdmonOutQuery(get_called_class());
    }
}
