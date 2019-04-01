<?php
/**
 * Created by PhpStorm.
 * User: margaritapopova
 * Date: 2019-03-22
 * Time: 18:22
 */

namespace app\base;


use yii\web\Controller;

class BaseController extends Controller
{
    public function afterAction($action, $result)
    {
        return parent::afterAction($action, $result);

        $url = \Yii::$app->request->url;
        \Yii::$app->session->set('last_page_url', $url);

        return $result;
    }
}