#yii2-superfish
##Yii2 widget for Jquery Superfish (jQuery menu plugin)

### Usage Example

#####1. Config file:
~~~php
Yii::setAlias('let', realpath(__DIR__ . '/../../frontend/widgets/let'));
~~~

#####2. View file:
~~~php
<?php

echo let\superfish\Superfish::widget([
    'data' => array(
        array(
            'title' => 'N1',
            'url' => '',
            'children' =>
            array(
                array(
                    'title' => 'N11',
                    'url' => '',
                    'children' =>
                    array(
                        array(
                            'title' => 'N111',
                            'url' => '',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'title' => 'N2',
            'url' => '',
            'children' =>
            array(
                array(
                    'title' => 'N21',
                    'url' => '',
                ),
            ),
        ),
    ),
    'htmlOptions' => array(
        'id' => 'testid',
    ),
    'configs' => array(
        ...
    ),
]);
~~~