<?php

namespace frontend\widgets\let\superfish;
use yii\web\AssetBundle;

class SuperfishAssets extends AssetBundle
{
	public $sourcePath = '@app/widgets/let/superfish';
	public $basePath = '@webroot/assets';
	//public $baseUrl = '@web';
	 public $css = [
         'superfish/css/superfish.css'
	 ];
	public $js = [
		'superfish/js/hoverIntent.js',
		'superfish/js/superfish.js',
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\web\JqueryAsset',
	];
}
