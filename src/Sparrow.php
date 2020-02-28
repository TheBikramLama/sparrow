<?php
namespace Thebikramlama\Sparrow;

use GuzzleHttp\Client;

class Sparrow {
	public static function getAccessToken() { return config('sparrow.access_token'); }
	public static function getFrom() { return config('sparrow.from'); }
	public static function getApiUrl() { return config('sparrow.api_endpoint'); }
	public static function getSendUrl() { return Sparrow::getApiUrl().config('sparrow.methods.send'); }
	public static function getCreditUrl() { return Sparrow::getApiUrl().config('sparrow.methods.credit'); }

	public static function send( $to = Null, $text = Null, $from = Null, $accessToken = Null )
	{
		if ( is_null($to) || is_null($text) ) return json_encode(['response_code' => 404, 'response' => 'Required Fields Missing.']);
		$from = is_null($from) ? Sparrow::getFrom() : $from;
		$accessToken = is_null($accessToken) ? Sparrow::getAccessToken() : $accessToken;

		$client = new Client();
		$request = $client->get( Sparrow::getSendUrl(), [
			'query' => [
				'token' => $accessToken,
				'from' => $from,
				'to' => $to,
				'text' => $text
			],
			'http_errors' => false
		]);

		$response = $request->getBody();
		return $response;
	}

	public static function credits( $accessToken = Null )
	{
		$accessToken = is_null($accessToken) ? Sparrow::getAccessToken() : $accessToken;

		$client = new Client();
		$request = $client->get( Sparrow::getCreditUrl(), [
			'query' => [
				'token' => $accessToken
			],
			'http_errors' => false
		]);

		$response = $request->getBody();
		return $response;
	}
}