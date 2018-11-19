*Esta herramienta digital forma parte del catálogo de herramientas del **Banco Interamericano de Desarrollo**. Puedes conocer más sobre la iniciativa del BID en [code.iadb.org](https://code.iadb.org)*

## API del Sistema de Gestión de Incidencias en Salud SGiS

[![Build Status](https://travis-ci.org/EL-BID/API-SGiS.svg?branch=master)](https://travis-ci.org/EL-BID/API-SGiS)

### Descripción y contexto
---
[Salud Mesoamérica, ME-G1004](https://www.iadb.org/en/project/ME-G1004 )

Una de las prioridades de la Secretaría de Salud del Estado de Chiapas es tener herramientas para implementar acciones que permitan el acceso de las mujeres a los servicios obstétricos, a fin de reducir la muerte materna y neonatal; Por lo tanto, la creación de SGiS, es una estrategia para fortalecer la sistematización en atención de referencias, respuesta de urgencias, emergencias obstétricas y neonatales; cada unidad hospitalaria será la central de información; encargada de gestionar a pacientes en salud maternal, desde el monitoreo, registro y seguimiento de las incidencias; los procesos serán controlados a través de SGiS, estos para coordinar la red de servicios a fin de brindar una atención resolutiva a los usuarios dentro del menor tiempo posible.

Para contribuir a mejorar la calidad y eficacia de los servicios de salud deberá existir un sistema de referencia y respuesta que “constituya el enlace entre las unidades hospitalarias operativas de los niveles de atención que conforman la red de servicios, con el propósito de brindar a los usuarios atención médica integral y oportuna en las unidades, conforme al padecimiento de la paciente y la capacidad resolutiva de la unidad hospitalaria que resulten más convenientes”.

La arquitectura REST es muy útil para construir un cliente/servidor para aplicaciones en red. REST significa Representational State Transfer (Transferencia de Estado Representacional) de sus siglas en inglés. Una API REST es una API, o librería de funciones, a la cual accedemos mediante protocolo HTTP, ósea desde direcciones webs o URL mediante las cuales el servidor procesa una consulta a una base de datos y devuelve los datos del resultado en formato XML, JSON, texto plano, etc. (Para el proyecto CIUM nos enfocaremos en JSON) Mediante REST utilizas los llamados Verbos HTTP, que son GET (Mostrar), POST (Insertar), PUT (Agregar/Actualizar) y DELETE (Borrar).

### Guía de usuario
---

![Configuracion Header para Login desde postman](https://github.com/EL-BID/API-SGiS/blob/master/public/img/LoginHeader.png)

![Login desde postman](https://github.com/EL-BID/API-SGiS/blob/master/public/img/LoginUser.png)

![Listar unidades medicas](https://github.com/EL-BID/API-SGiS/blob/master/public/img/ListaUnidadesMedicas.png)

### Guía de instalación
---
#### Requisitos
##### Software
Para poder instalar y utilizar esta API, deberá asegurarse de que su servidor cumpla con los siguientes requisitos:
* MySQL®
* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* [Composer](https://getcomposer.org/) es una librería de PHP para el manejo de dependencias.
* Opcional [Postman](https://www.getpostman.com/) que permite el envío de peticiones HTTP REST sin necesidad de desarrollar un cliente.

#### Instalación
Guia de Instalación Oficial de Laravel 5.4 [Aquí](https://laravel.com/docs/5.4/installation)
##### Proyecto (API)
El resto del proceso es sencillo.
1. Clonar el repositorio con: `git clone https://github.com/Luisvl13/API-SGiS.git`
2. Instalar dependencias: `composer install`
3. Renombrar el archivo `base.env` a `.env` ubicado en la raiz del directorio de instalación y editarlo.
       
       APP_KEY=base64:KlxlEEJ4tz9cVma1yE8XdoYZ1YRxsChhPrBjkUSEsSg=
       APP_DEBUG=true
       
       DB_HOST=localhost
       DB_DATABASE=ugus_v2
       DB_USERNAME=user
       DB_PASSWORD=secret
       
       PUSHER_APP_ID="ID_APP"
       PUSHER_APP_KEY="KEY_APP"
       PUSHER_APP_SECRET="secret"
       PUSHER_APP_CHANNEL="channel"
       PUSHER_APP_CLUSTER="cluster"
       
    * ***Opcional*** Si va a usar pusher debe crear una cuenta [Aquí](https://pusher.com/)
    
* **APP_KEY**: Clave de encriptación para laravel.
* **APP_DEBUG**: `true` o `false` dependiento si desea o no tener opciones de debug en el código.
* **DB_HOST**: Dominio de la conexión a la base de datos.
* **DB_DATABASE**: Nombre de la base de datos.
* **DB_USERNAME**: Usuario con permisos de lectura y escritura para la base de datos.
* **DB_PASSWORD**: Contraseña del usuario.

* **PUSHER_APP_ID**: ID de la APP que te da el pusher al crear un proyecto.
* **PUSHER_APP_KEY**: Llave para el proyecto de pusher.
* **PUSHER_APP_SECRET**: Contraseña para el proyecto de pusher.
* **PUSHER_APP_CHANNEL**: Canal que desea usar para las notificaciones con pusher.
* **PUSHER_APP_CLUSTER**: Cluster seleccionado para el canal del pusher.

##### Base de Datos del proyecto
1. Abrir su Sistema Gestor de Base de Datos y crear la base de datos `ugus_v2`.
2. Abrir una terminal con la ruta raiz donde fue clonado el proyecto y correr cualquiera de los siguientes comandos:
    * `php artisan migrate --seed` Crea las tablas y e inserta datos precargados de muestra.
    * `php artisan migrate` Solo crea las tablas sin datos.
3. Una vez configurado el proyecto se inicia con `php artisan serve` y nos levanta un servidor: 
    * `http://127.0.0.1:8000` o su equivalente `http://localhost:8000`

### Cómo contribuir
---
Si deseas contribuir con este proyecto, por favor lee las siguientes guías que establece el [BID](https://www.iadb.org/es "BID"):

* [Guía para Publicar Herramientas Digitales](https://el-bid.github.io/guia-de-publicacion/ "Guía para Publicar") 
* [Guía para la Contribución de Código](https://github.com/EL-BID/Plantilla-de-repositorio/blob/master/CONTRIBUTING.md "Guía de Contribución de Código")

### Código de conducta 
---
Puedes ver el código de conducta para este proyecto en el siguiente archivo [CODEOFCONDUCT.md](https://github.com/EL-BID/API-SGiS/blob/master/CODEOFCONDUCT.md).

### Autor/es
---
* **[Luis Alberto Valdez Lescieur](https://github.com/Luisvl13  "Github")** - [Bitbucket](https://bitbucket.org/luisvl13 "Bitbucket") - [Twitter](https://twitter.com/LuisVLescieur)
* **[Ramiro Gabriel Alférez Chavez](mailto:ramiro.alferez@gmail.com "Correo electrónico")**
* **[Eliecer Ramirez Esquinca](https://github.com/checherman "Github")**
* **[Javier Alejandro Gosain Díaz](https://github.com/goraider "Github")**
* **Margarita Sariñana Ortiz** - Secretaria de Salud del Estado de Chiapas ISECH

### Información adicional
---
Para usar el sistema completo con una interfaz web y no solo realizar las peticiones HTTP REST, debe tener configurado el siguiente proyecto:
* **[Cliente WEB SGiS](https://github.com/EL-BID/CLIENTE-SGiS "Proyecto WEB que complementa el sistema")**

### Licencia 
---
La Documentación de Soporte y Uso del software se encuentra licenciada bajo Creative Commons IGO 3.0 Atribución-NoComercial-SinObraDerivada (CC-IGO 3.0 BY-NC-ND)  [LICENSE.md](https://github.com/EL-BID/API-SGiS/blob/master/LICENSE.md)

## Limitación de responsabilidades

El BID no será responsable, bajo circunstancia alguna, de daño ni indemnización, moral o patrimonial; directo o indirecto; accesorio o especial; o por vía de consecuencia, previsto o imprevisto, que pudiese surgir:

i. Bajo cualquier teoría de responsabilidad, ya sea por contrato, infracción de derechos de propiedad intelectual, negligencia o bajo cualquier otra teoría; y/o

ii. A raíz del uso de la Herramienta Digital, incluyendo, pero sin limitación de potenciales defectos en la Herramienta Digital, o la pérdida o inexactitud de los datos de cualquier tipo. Lo anterior incluye los gastos o daños asociados a fallas de comunicación y/o fallas de funcionamiento de computadoras, vinculados con la utilización de la Herramienta Digital.
