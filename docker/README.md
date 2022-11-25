## Build do container
```
docker build -t docker-duosystem-composer-centos7 --network=host .
```

## Entrando no container
```
docker run -d --network=host -v $(pwd):/Code -p 80:80 --name docker-lumen docker-duosystem-composer-centos7
```
