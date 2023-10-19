<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property int $salesId
 * @property int $productId
 * @property int $shopId
 * @property int $sale
 * @property string $Date
 * @property string $salescol
 * @property int $stockId
 *
 * @property Sales $product
 * @property Sales[] $sales
 * @property Shop $shop
 * @property Stock $stock
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productId', 'shopId', 'sale', 'Date', 'salescol', 'stockId'], 'required'],
            [['productId', 'shopId', 'sale', 'stockId'], 'integer'],
            [['Date'], 'safe'],
            [['salescol'], 'string', 'max' => 45],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Sales::class, 'targetAttribute' => ['productId' => 'productId']],
            [['shopId'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::class, 'targetAttribute' => ['shopId' => 'shopId']],
            [['stockId'], 'exist', 'skipOnError' => true, 'targetClass' => Stock::class, 'targetAttribute' => ['stockId' => 'stockId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'salesId' => 'Sales ID',
            'productId' => 'Product ID',
            'shopId' => 'Shop ID',
            'sale' => 'Sale',
            'Date' => 'Date',
            'salescol' => 'Salescol',
            'stockId' => 'Stock ID',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Sales::class, ['productId' => 'productId']);
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::class, ['productId' => 'productId']);
    }

    /**
     * Gets query for [[Shop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shop::class, ['shopId' => 'shopId']);
    }

    /**
     * Gets query for [[Stock]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStock()
    {
        return $this->hasOne(Stock::class, ['stockId' => 'stockId']);
    }
}