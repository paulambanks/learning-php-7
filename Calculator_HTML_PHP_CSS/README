# PHP Template

Docker image with PHP 7, Apache, and XDebug.

## Layout

* Dockerfile (Describes how to build the Docker image)
* docker-compose.yml (Launches the apache webserver on port 80 and the 'src' directory is mapped to '/var/www/html')
* xdebug-custom.ini (Allows XDebug to connect to the host on port 9000, so IDE's can use XDebug)
* src (PHP application sources go here)
* src/index.php (Text php application prints phpinfo())

## Quick Commands

Starts the apache server in the foreground.

```bash
docker-compose up
```

Start the apache server in the background.
```bash
docker-compose up -d
```

Stop the apache server.
```bash
docker-compose down
```

Stop the apache server, and remove volumes, etc.
```bash
docker-compose down -f
```

Update / rebuild the docker image.

```bash
docker-compose build
```
