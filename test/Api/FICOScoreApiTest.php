<?php

namespace FicoscoreV2Sandbox\Client;

use \FicoscoreV2Sandbox\Client\Configuration;
use \FicoscoreV2Sandbox\Client\ApiException;
use \FicoscoreV2Sandbox\Client\ObjectSerializer;

class FICOScoreApiTest extends \PHPUnit_Framework_TestCase
{
    
    
    public function setUp()
    {
        $handler = \GuzzleHttp\HandlerStack::create();
        $config = new \FicoscoreV2Sandbox\Client\Configuration();
        $config->setHost('the_url');

        $client = new \GuzzleHttp\Client(['handler' => $handler, 'verify' => false]);
        $this->apiInstance = new \FicoscoreV2Sandbox\Client\Api\FICOScoreApi($client,$config);
    }
    
  
    public function testGetReporte()
    {
        $x_api_key = "XXXXX";

        $request = new \FicoscoreV2Sandbox\Client\Model\Peticion();
        
        

        $request->setFolio("XXXXX");

        $persona = new \FicoscoreV2Sandbox\Client\Model\Persona();
        $persona->setNombres("XXXXX");
        $persona->setApellidoPaterno("XXXX");
        $persona->setApellidoMaterno("XXXXX");
        $persona->setFechaNacimiento("DD-MM-YYYY");
        $persona->setRFC("XXXXXXXXXX");

        $domicilio = new \FicoscoreV2Sandbox\Client\Model\Domicilio();
        $domicilio->setDireccion("XXXXXXXXXX");
        $domicilio->setColoniaPoblacion("XXXXXXX");
        $domicilio->setCiudad("XXXXXXX");
        $domicilio->setCP("XXXXX");
        $domicilio->setDelegacionMunicipio("XXXXXXXXX");
        $domicilio->setEstado("CDMX");

        $persona->setDomicilio($domicilio);

        $request->setPersona($persona);

        try {
            $result = $this->apiInstance->getReporte($x_api_key, $request);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ApiTest->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
}
