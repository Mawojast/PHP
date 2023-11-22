<?php
namespace Resource;
use Resource\API;
use Exception;

final class UrlAPI implements API{

    private string $host = '';
    private array $queries = [];
    private array $result = [];
    private array $substitutedArticleImage = [];

    public function __construct(string $host){

        $this->host = $host;
    }
    public function addParameter(string $key, string $value): void{

        $this->queries[$key] = $value;
    }

    public function request(): void{

        $httpQuery = http_build_query($this->queries);
        $curl = curl_init(sprintf('%s?%s', $this->host, $httpQuery));
        
        if(!$curl){
            throw new Exception("Curl init failed");
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);

        if(curl_errno($curl)){
            throw new Exception('Curl error: '. curl_error($curl));
        }

        curl_close($curl);
        $this->result = json_decode($json, true);

    }

    public function getResult(): array{

        return $this->result;
    }
}
