<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $foto
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 *
 * @property string $nombre
 * @property string $tipo_usuario
 * @property string $telefono
 * @property string $genero
 *
 * @property Convenio[] $convenios
 * @property Convenio[] $convenios0
 * @property DeadlineAviso[] $deadlineAvisos
 * @property Estudiante $estudiante
 * @property Evento[] $eventos
 * @property Mensaje[] $mensajes
 * @property Mensaje[] $mensajes0
 * @property RelExpFase[] $relExpFases
 * @property RelExpFavGestor[] $relExpFavGestors
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['email', 'nombre', 'tipo_usuario', 'telefono', 'genero'], 'required'],
            [['tipo_usuario', 'genero'], 'string'],
            [['email', 'foto'], 'string', 'max' => 255],
            [['nombre'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 20],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nombre de usuario',
            'email' => 'Correo electrónico',
            'foto' => 'Foto de perfil',
            'status' => 'Estado',
            'created_at' => 'Fecha de registro',
            'nombre' => 'Nombre',
            'tipo_usuario' => 'Tipo de usuario',
            'telefono' => 'Teléfono',
            'genero' => 'Género',
            'created_at' => 'Fecha de registro',
            'updated_at' => 'Última actualización'
        ];
    }

    /**
     * Gets query for [[Convenios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConveniosAsCreador()
    {
        return $this->hasMany(Convenio::className(), ['creado_por' => 'id']);
    }

    /**
     * Gets query for [[Convenios0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConveniosAsTutor()
    {
        return $this->hasMany(Convenio::className(), ['id_tutor' => 'id']);
    }

    /**
     * Gets query for [[DeadlineAvisos]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getDeadlineAvisos()
    {
        return $this->hasMany(DeadlineAviso::className(), ['id_responsable' => 'id']);
    }

    /**
     * Gets query for [[Estudiante]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['id_usuario' => 'id']);
    }

    /**
     * Gets query for [[Eventos]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['id_creador' => 'id']);
    }

    /**
     * Gets query for [[Mensajes]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getMensajesAsEmisor()
    {
        return $this->hasMany(Mensaje::className(), ['id_emisor' => 'id']);
    }

    /**
     * Gets query for [[Mensajes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMensajesAsReceptor()
    {
        return $this->hasMany(Mensaje::className(), ['id_receptor' => 'id']);
    }

    /**
     * Gets query for [[RelExpFases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelExpFases()
    {
        return $this->hasMany(RelExpFase::className(), ['id_gestor' => 'id']);
    }

    /**
     * Gets query for [[RelExpFavGestors]].
     * @return \yii\db\ActiveQuery
     */
    public function getRelExpFavGestors()
    {
        return $this->hasMany(RelExpFavGestor::className(), ['id_gestor' => 'id']);
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getNombreUsername()
    {
        return $this->nombre . ' (' . $this->username . ')';
    }
}