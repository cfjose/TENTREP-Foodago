<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
		'css/animate.css',
		'css/bootstrap.css',
		'css/style.css',
		'css/bootsnipp.css',
    ];
    public $js = [
		'js/classie.js',
		'js/easing.js',
		'js/jquery.carouFredSel-6.1.0-packed.js',
		'js/jquery.easydropdown.js',
		'js/jquery.flexisel.js',
		'js/jquery.min.js',
		'js/move-top.js',
		'js/simpleCart.min.js',
		'js/tms-0.4.1.js',
		'js/uisearch.js',
		'js/wow.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
