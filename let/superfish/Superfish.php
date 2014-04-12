<?php
/**
 * Superfish v1.7.4
 * Homepage: http://users.tpg.com.au/j_birch/plugins/superfish/
 * Examples: http://users.tpg.com.au/j_birch/plugins/superfish/examples/
 * Options: http://users.tpg.com.au/j_birch/plugins/superfish/options/
 * 
 * Let Yii2 Superfish v1.7.4 (Yii Framework 2.0 extention)
 * Auth: nguago (nguago@let.vn)
 * Group: LetYii Team (letyii.com)
 */

namespace frontend\widgets\let\superfish;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use frontend\widgets\let\superfish\SuperfishAssets;

class Superfish extends \yii\base\Widget {

    public $id = '';
    public $class = '';
    public $data = array();
    public $configs = array();
    public $htmlOptions = array('class' => 'sf-menu', 'id' => 'sf-menu');
    private $htmlTree = '';

    /**
     * Initializes the widget.
     */
    public function init() {
        SuperfishAssets::register($this->view);

        // merge options
        $htmlOptionsDefault = array('class' => 'sf-menu', 'id' => 'sf-menu');
        $this->htmlOptions = ArrayHelper::merge($htmlOptionsDefault, $this->htmlOptions);
        
        // render js
        $this->getView()->registerJs("
            (function($){ //create closure so we can safely use $ as alias for jQuery
                $(document).ready(function(){
                    // initialise plugin
                    var example = $('#".$this->htmlOptions['id']."').superfish({
                        //add options here if required
                    });
                });
            })(jQuery);
		");
    }

    /**
     * Renders the widget.
     */
    public function run() {
        $this->createMenu($this->data, $this->htmlOptions);

        echo $this->htmlTree;
    }

    public function getConfigs() {
        return $configs = json_encode($this->configs);
    }

    /**
     * Create Menu from array
     * @param array $data
     * @param array $htmlOptions
     * @return string
     */
    function createMenu($data, $htmlOptions = array()) {
        $this->htmlTree .= Html::beginTag('ul', $htmlOptions);
        foreach ($data as $item) {
            $this->htmlTree .= Html::beginTag('li') . Html::a($item['title'], $item['url']);
            if (isset($item['children']) AND !empty($item['children']))
                $this->createMenu($item['children']);
            $this->htmlTree .= Html::endTag('li');
        }
        $this->htmlTree .= Html::endTag('ul');
        return $this->htmlTree;
    }

}
