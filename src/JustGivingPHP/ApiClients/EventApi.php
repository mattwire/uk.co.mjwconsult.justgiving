<?php namespace JustGivingClient;

include_once 'ClientBase.php';
include_once 'Http/CurlWrapper.php';

class EventApi extends ClientBase
{		
	public $Parent;
	public $curlWrapper;
	
	public function __construct($justGivingApi)
	{
		$this->Parent		=	$justGivingApi;
		$this->curlWrapper	= new CurlWrapper();
	}

    public function Create($event)
	{
		$locationFormat = $this->Parent->RootDomain . "{apiKey}/v{apiVersion}/event";
		$url = $this->BuildUrl($locationFormat);
		$payload = json_encode($event);
		$json = $this->curlWrapper->PostAndGetResponse($url, $this->BuildAuthenticationValue(), $payload);
		return json_decode($json, TRUE);
	}

	public function RetrieveV2($eventId)
	{
		$httpResponse = new HTTPResponse();
		$locationFormat = $this->Parent->RootDomain . "{apiKey}/v{apiVersion}/event/" . $eventId;
		$url = $this->BuildUrl($locationFormat);
		$result = $this->curlWrapper->GetV2($url, $this->BuildAuthenticationValue());
		$httpResponse->bodyResponse = json_decode($result->bodyResponse);
		$httpResponse->httpStatusCode = $result->httpStatusCode;	
		return $httpResponse;
	}
	
	public function Retrieve($eventId)
	{
		$locationFormat = $this->Parent->RootDomain . "{apiKey}/v{apiVersion}/event/" . $eventId;
		$url = $this->BuildUrl($locationFormat);
		$json = $this->curlWrapper->Get($url, $this->BuildAuthenticationValue());
		return json_decode($json, TRUE);
	}	
	
	public function RetrievePages($eventId, $pageSize=50, $pageNumber=1)
	{
		$locationFormat = $this->Parent->RootDomain . "{apiKey}/v{apiVersion}/event/" . $eventId . "/pages?PageSize=".$pageSize."&PageNum=".$pageNumber;
		$url = $this->BuildUrl($locationFormat);	
		$json = $this->curlWrapper->Get($url, $this->BuildAuthenticationValue());
		return json_decode($json, TRUE);
	}

	public function GetTypes() {
    $locationFormat = $this->Parent->RootDomain . "{apiKey}/v{apiVersion}/event/types";
    $url = $this->BuildUrl($locationFormat);
    $json = $this->curlWrapper->Get($url, $this->BuildAuthenticationValue());
    return json_decode($json, TRUE);
  }
}
