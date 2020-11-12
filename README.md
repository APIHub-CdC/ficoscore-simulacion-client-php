# ficoscore-simulacion-client-php
La API de FICO Score determina la probabilidad de incumplimiento de un acreditado en los próximos doce meses. A mayor puntaje de score, menor es el riesgo. <br/><img src='https://github.com/APIHub-CdC/imagenes-cdc/blob/master/circulo_de_credito-apihub.png' height='37' width='160'/><br/>

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

Los siguientes datos a modificar se encuentran en ***test/Api/ApiTest.php***

Es importante contar con el setUp() que se encargará de inicializar la url. Modificar la URL ***('the_url')*** de la petición del objeto ***$config***, como se muestra en el siguiente fragmento de código:

```php
<?php
public function setUp()
{
    $config = new Configuration();
    $config->setHost('the_url');
    $client = new Client();
    $this->apiInstance = new Instance($client, $config);
    $this->x_api_key = "your_x_api_key";
}  
```
```php

<?php
/**
* Este es el método que se será ejecutado en la prueba ubicado en path/to/repository/test/Api/ApiTest.php
*/
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
?>
```
## Pruebas unitarias

Para ejecutar las pruebas unitarias:

```sh
./vendor/bin/phpunit
```

---
[CONDICIONES DE USO, REPRODUCCIÓN Y DISTRIBUCIÓN](https://github.com/APIHub-CdC/licencias-cdc)

[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
