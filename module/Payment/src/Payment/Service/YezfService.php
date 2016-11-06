<?php
/**
 * DBShop 电子商务系统
 *
 * ==========================================================================
 * @link      http://www.dbshop.net/
 * @copyright Copyright (c) 2012-2016 DBShop.net Inc. (http://www.dbshop.net)
 * @license   http://www.dbshop.net/license.html License
 * ==========================================================================
 *
 * @author    静静的风
 *
 */

namespace Payment\Service;

/**
 * 余额付款
 */
class YezfService
{
    private $xmlReader;
    private $paymentConfig;
    private $paymentForm;
    public function __construct()
    {
        if(!$this->xmlReader) {
            $this->xmlReader = new \Zend\Config\Reader\Xml();
        }
        if(!$this->paymentConfig) {
            $this->paymentConfig = $this->xmlReader->fromFile(DBSHOP_PATH . '/data/moduledata/Payment/yezf.xml');
        }
        if(!$this->paymentForm) {
            $this->paymentForm = new \Payment\Form\PaymentForm();
        }
    }
    public function savePaymentConfig(array $data)
    {
        $xmlWriter   = new \Zend\Config\Writer\Xml();
        $configArray = $this->paymentForm->setFormValue($this->paymentConfig, $data);
        $xmlWriter->toFile(DBSHOP_PATH . '/data/moduledata/Payment/yezf.xml', $configArray);
        return $configArray;
    }
    /**
     * 获取表单数组
     * @return multitype:multitype:string array  Ambigous <\Payment\Service\multitype:string, multitype:string array >
     */
    public function getFromInput()
    {
        $inputArray = $this->paymentForm->createFormInput($this->paymentConfig);
        return $inputArray;
    }
    /*========================================================下面为支付处理=======================================================*/
    /**
     * 线下支付处理，跳转到下一步
     * @param unknown $data
     */
    public function paymentTo($data)
    {
        //返回url
        $returnUrl = $data['return_url'];
        header("Location: ".$returnUrl);
        exit();
    }
    /**
     * 支付抛出form
     * @param $orderInfo
     * @param array $language
     * @return array|multitype
     */
    public function paymentReturn ($orderInfo, array $language=array())
    {
        $state = false;
        if($orderInfo->yezfPayState == 'true') {
            $state   = true;
            $message = $language['pay_finish'];
        }
        if($orderInfo->yezfPayState == 'false') $message = $language['pay_yezf_error'];
        if($orderInfo->yezfPayState == 'currency_error') $message = $language['pay_currency_error'];
        $tableHtml = '<table class="table table-bordered"><tbody><tr><td><h3>'.$message.'</h3></td></tr></tbody></table>';

        return array('payFinish'=>$state, 'html'=>$tableHtml);
    }
    /**
     * 发货处理
     * @param $orderInfo
     * @param $express
     * @return bool
     */
    public function toSendOrder ($orderInfo, $express)
    {
        return true;
    }
}

?>