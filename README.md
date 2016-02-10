# Roundcube Docker image

[![](https://badge.imagelayers.io/konjak/roundcube:latest.svg)](https://imagelayers.io/?images=konjak/roundcube:latest)

Production ready Docker container for [Roundcube](https://github.com/roundcube/roundcubemail) with MySQL usage.

## Features - why using this image instead of several others?

- Uses [alpine](https://registry.hub.docker.com/_/alpine/) base image
- This image is as small as possible - uses PHP built-in webserver
- Uses linked MySQL DB and IMAP containers for those services
- Waits for MySQL container to be ready before initializing roundcube DB
- It's possible to completely change roundcube's configuration
- Installs latest stable roundcube release

## Usage

```bash
sudo docker run \
  -p 80:80 \
  -v ./folder-with-php-config-files:/config \
  -e MYSQL_HOST=db \
  -e MYSQL_USER=roundcube \
  -e MYSQL_PASSWORD=password \
  -e MYSQL_DATABASE=roundcube \
  -e MAIL_HOST=mail.domain.tld \
  -e RC_DEFAULT_PORT=143 \
  --link db:db \
  --link mail:mail.domain.tld \
  konjak/roundcube
```

When using tls (which is recommended and preconfigured) you have to link the real mail hostname e.g. mail.domain.tld. Otherwise roundcube will not connect because the used name differs from the one in the certificate. So do NOT use just "mail". For me it was not possible to connect to a hostname bound to the external ip of my server (when running mailserver and roundcube on the same machine).

All provided env vars starting with RC\_ will be converted to config values for roundcube.

It's also possible to mount a folder with php config files to `/config`. All \*.php files in this folder will be executed after the base config.

## Status

Production stable.
