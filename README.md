# twinX
## Requisitos para instalar el proyecto
- Tener instalado [composer](https://getcomposer.org/) y [PHP](https://www.php.net/)
- Seguir los pasos para la instalación en https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/start-installation.md
- Ejecutar la orden `composer install` para instalar las dependencias no encontradas. Acto seguido, ejecutar `php init`, todo ello en el directorio del proyecto.
- Instalar Bootstrap 4 con `composer require yiisoft/yii2-bootstrap4` (es recomendable eliminar también Bootstrap 3 con `composer remove yiisoft/yii2-bootstrap`). Tras ello podríamos encontrar algún error de dependencias, por lo que sería necesario sustituir cualquier ocurrencia de "bootstrap" por "bootstrap4".
