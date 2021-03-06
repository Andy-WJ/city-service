<?php
namespace CityService\Drivers\Dada;

use CityService\Drivers\Dada\api\AddOrderApi;
use CityService\Drivers\Dada\client\DadaRequestClient;
use CityService\Drivers\Dada\config\Config;
use CityService\Drivers\Dada\model\OrderModel;
//参考文档 http://newopen.imdada.cn/#/development/file/add?_k=ff7mls


//*********************1.配置项*************************
$config = new Config(0, false);

//*********************2.实例化一个model*************************
$orderModel = new OrderModel();
$orderModel->setShopNo('xxxxxxxxxxxxorigin_shop_no');	// 第三方门店编号
$orderModel->setOriginId('xxxxxxxxxxxxxxxxxx');			// 第三方订单号
$orderModel->setCityCode('xxxxx');						// 城市code(可以参照城市code接口)
$orderModel->setCargoPrice(10);
$orderModel->setIsPrepay(0);
$orderModel->setReceiverName('xxxxxxxxxxxxxxxxxx');
$orderModel->setReceiverAddress('xxxxxxxxxxxxxxx');
$orderModel->setReceiverLat(0);
$orderModel->setReceiverLng(0);
$orderModel->setReceiverPhone('xxxxxxxxxxxxxxxxxx');
$orderModel->setCallback('');							// 回调url, 每次订单状态变更会通知该url(参照回调接口)

//*********************3.实例化一个api*************************
$addOrderApi = new AddOrderApi(json_encode($orderModel));

//***********************4.实例化客户端请求************************
$dada_client = new DadaRequestClient($config, $addOrderApi);
$resp = $dada_client->makeRequest();
echo json_encode($resp);
