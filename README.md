
## ORIENTAÇÕES PARA SUBRI CONTAINER
## SETTINGS

subir localcamente:
~~~bash
$git clone git@gitlab.duosystem.com.br:go/api_integracao_mra.git
$sh api_integracao_mra/deploy
~~~

### O QUE O SCRIPT FAZ

Configurações no arquivo

**.env**

~~~bash
## SETTINGS LOCAL
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:b1PWtfuJ6Atm3FpEeC56MpzqdSftXVJsKW+yTYgYwfs=
APP_DEBUG=false
APP_LOG_LEVEL=debug
APP_URL=http://localhost

~~~

acessar o diretorio e executar:

~~~bash
$ cd api_integracao_mra/
$ cp -rfv .env.example .env
$ docker-compose up -d --build
~~~

apos subir, entrar no container e executar o comando:

~~~bash
[root@abd26c326746 html]# composer install
~~~