<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $productId
 * @property string $productName
 * @property int $deleted
 *
 * @property Prices[] $prices
 * @property Stock[] $stocks
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productName'], 'required'],
            [['deleted'], 'integer'],
            [['productName'], 'string', 'max' => 200],
            [['productName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'productId' => 'Product ID',
            'productName' => 'Product Name',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[Prices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Prices::class, ['productId' => 'productId']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['productId' => 'productId']);
    }
}
