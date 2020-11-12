<?php

namespace FS\Simulacion\MX\Client;

use \GuzzleHttp\Client;

use \FS\Simulacion\MX\Client\Configuration;
use \FS\Simulacion\MX\Client\ApiException;
use \FS\Simulacion\MX\Client\ObjectSerializer;
use \FS\Simulacion\MX\Client\Api\FSApi as Instance;
use \FS\Simulacion\MX\Client\Model\Peticion;
use \FS\Simulacion\MX\Client\Model\Persona;
use \FS\Simulacion\MX\Client\Model\Domicilio;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $config = new Configuration();
        $config->setHost('the_url');
        $this->x_api_key = "your_x_api_key";
        $client = new Client();
        $this->apiInstance = new Instance($client,$config);
    }

    public function testGetReporte()
    {
        $request = new Peticion();
        $persona = new Persona();
        $domicilio = new Domicilio();

        $request->setFolio("123456");
        
        $persona->setNombres("JUAN");
        $persona->setApellidoPaterno("SESENTAYDOS");
        $persona->setApellidoMaterno("PRUEBA");
        $persona->setFechaNacimiento("1965-08-09");
        $persona->setRFC("SEPJ650809JG1");

        $domicilio->setDireccion("PASADISO ENCONTRADO 58");
        $domicilio->setColoniaPoblacion("MONTEVIDEO");
        $domicilio->setCiudad("CIUDAD DE MÉXICO");
        $domicilio->setCP("07730");
        $domicilio->setDelegacionMunicipio("GUSTAVO A MADERO");
        $domicilio->setEstado("CDMX");

        $persona->setDomicilio($domicilio);

        $request->setPersona($persona);

        try {
            $result = $this->apiInstance->getReporte($this->x_api_key, $request);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ApiTest->testGetReporte: ', $e->getMessage(), PHP_EOL;
        }
    }
}
