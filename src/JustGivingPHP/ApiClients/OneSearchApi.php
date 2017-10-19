<?php namespace JustGivingClient;

include_once 'ClientBase.php';
include_once 'Http/CurlWrapper.php';

class OneSearchApi extends ClientBase
{

	public $Parent;
	public $curlWrapper;

	public function __construct($justGivingApi)
	{
		$this->Parent		=	$justGivingApi;
		$this->curlWrapper	= new CurlWrapper();
	}

	public function Index($searchTerm, $resultByIndex, $limit=10)
	{
		//$locationFormat = $this->Parent->RootDomain . "{apiKey}/v{apiVersion}/onesearch?q=" . $searchTerm . "&i=". $resultByIndex . "&limit=" .  $limit;
    $locationFormat = $this->Parent->RootDomain . "{apiKey}/v{apiVersion}/onesearch?q=" . $searchTerm . "&i=". $resultByIndex . "&limit=" .  $limit . "&debug=1";
		$url = $this->BuildUrl($locationFormat);
		$json = $this->curlWrapper->Get($url);
		return json_decode($json);
	}
}