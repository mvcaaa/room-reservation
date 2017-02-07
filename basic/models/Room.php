<?php
/**
 * Created by MvC on 07.02.2017.
 */

namespace app\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Reservation[] $reservations
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasOne(Reservation::className(), ['room_id' => 'id']);
    }

//    public function extraFields()
//    {
//        return [
//          'reservations',
//        ];
//    }

    public function fields()
    {
        return [
          'id' => 'id',
          'title' => 'title',
          'reservations' => 'reservations',
        ];
    }

}
