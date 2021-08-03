<?php

class VistaApiClient
{
    private static $BASE_CONNECT_URL = ['development' => 'https://newdemos-rest.vistahost.com.br'];
    private static $BASE_HEADERS = array("Accept" => "application/json");
    private static $BASE_PARAMS = ["key" => API_KEY];
    
    private static $BASE_PROPERTY_LIST = '/imoveis/listar?';
    private static $BASE_PROPERTY_LIST_FIELDS = '/imoveis/listarcampos?';

    private static $FIELDS = [];

    public static function getAllPropertyFields()
    {
        $params = array_merge(self::$BASE_PARAMS, ["tipo" => "imoveis"]);

        $url = self::$BASE_CONNECT_URL[ENVIRONMENT] . self::$BASE_PROPERTY_LIST_FIELDS . http_build_query($params);

        $response = Requests::get($url, self::$BASE_HEADERS);

        if(!$response->success)
            throw new Exception($response->body);

        $responseBody = json_decode($response->body);

        self::$FIELDS = $responseBody;

        return $responseBody;
    }

    public static function getAllProperty()
    {
        $params = array_merge(self::$BASE_PARAMS, ["finalidade" => "aluguel", "pesquisa" => ["fields" => self::$FIELDS, "filter" => ["Categoria" => "Apartamento"]]]);

        $url = self::$BASE_CONNECT_URL[ENVIRONMENT] . self::$BASE_PROPERTY_LIST . http_build_query($params);

        $response = Requests::get($url, self::$BASE_HEADERS);

        if(!$response->success)
            throw new Exception($response->body);

        return json_decode($response->body);
    }

}