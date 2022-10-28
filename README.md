# yii2-dropdowntree

    [
        //'label' => 'Категория',
        'attribute' => 'category_id',
        'value' => 'category.name',
        'contentOptions' => ['style'=>'padding:0px 0px 0px 30px;vertical-align: middle; margin: 0 auto;text-align: center'],
        'filter'=> \antimail\dropdowntree\DropdownTreeWidget::widget([
                'model'=> $searchModel,
                'attribute' => 'category_id',
                'items' => \common\models\Category::find()->asArray()->all(),
        ]),
    ],
