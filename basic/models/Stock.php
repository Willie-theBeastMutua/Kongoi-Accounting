<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $stockId
 * @property int $productId
 * @property int $statusId
 * @property int $createdby
 * @property string $createDate
 * @property int $shopId
 * @property int $buyingPrice
 *
 * @property Products $product
 * @property Sales[] $sales
 * @property Shop $shop
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productId', 'statusId', 'createdby', 'createDate', 'shopId', 'buyingPrice'], 'required'],
            [['productId', 'statusId', 'createdby', 'shopId', 'buyingPrice'], 'integer'],
            [['createDate'], 'safe'],
           ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stockId' => 'Stock ID',
            'productId' => 'Product',
            'statusId' => 'Status',
            'createdby' => 'Createdby',
            'createDate' => 'Create Date',
            'shopId' => 'Shop',
            'buyingPrice' => 'Buying Price',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::class, ['productId' => 'productId']);
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::class, ['stockId' => 'stockId']);
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
}
