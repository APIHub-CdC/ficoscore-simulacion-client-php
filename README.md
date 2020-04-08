# ficoscore-simulacion-client-php
La API de FICO Score determina la probabilidad de incumplimiento de un acreditado en los próximos doce meses. A mayor puntaje de score, menor es el riesgo.

## Requisitos

PHP 7.1 ó superior


### Dependencias adicionales
- Se debe contar con las siguientes dependencias de PHP:
    - ext-curl
    - ext-mbstring
- En caso de no ser así, para linux use los siguientes comandos

```sh
#ejemplo con php en versión 7.3 para otra versión colocar php{version}-curl
apt-get install php7.3-curl
apt-get install php7.3-mbstring
```
- Composer [vea como instalar][1]

## Instalación

Ejecutar: `composer install`

## Guía de inicio

### Paso 1. Agregar el producto a la aplicación

Al iniciar sesión seguir los siguientes pasos:

 1. Dar clic en la sección "**Mis aplicaciones**".
 2. Seleccionar la aplicación.
 3. Ir a la pestaña de "**Editar '@tuApp**' ".
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/edit_applications.jpg" width="900">
    </p>
 4. Al abrirse la ventana emergente, seleccionar el producto.
 5. Dar clic en el botón "**Guardar App**":
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/selected_product.jpg" width="400">
    </p>

### Paso 2. Capturar los datos de la petición

Los siguientes datos a modificar se encuentran en ***test/Api/FICOScoreApiTest.php***

Es importante contar con el setUp() que se encargará de inicializar la url. Modificar la URL ***('the_url')*** de la petición del objeto ***$config***, como se muestra en el siguiente fragmento de código:

```php
<?php
public function setUp()
{
     $handler = \GuzzleHttp\HandlerStack::create();
        $config = new \FicoscoreV2Sandbox\Client\Configuration();
        $config->setHost('the_url');

        $client = new \GuzzleHttp\Client(['handler' => $handler, 'verify' => false]);
        $this->apiInstance = new \FicoscoreV2Sandbox\Client\Api\FICOScoreApi($client,$config);
}    
```
```php

<?php
/**
* Este es el método que se será ejecutado en la prueba ubicado en path/to/repository/test/Api/FICOScoreApiTest.php
*/
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
?>
```
## Pruebas unitarias

Para ejecutar las pruebas unitarias:

```sh
./vendor/bin/phpunit
```

[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
