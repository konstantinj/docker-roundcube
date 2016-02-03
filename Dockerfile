FROM alpine
MAINTAINER Konstantin Jakobi <konstantin.jakobi@gmail.com>

ENV VERSION=1.1.4

RUN apk add --no-cache bash curl mysql-client php-imap php-pdo_mysql php-dom php-json php-openssl php-sockets php-iconv php-zip \
 && curl --location https://downloads.sourceforge.net/project/roundcubemail/roundcubemail/${VERSION}/roundcubemail-${VERSION}-complete.tar.gz | tar xzf - \
 && mv roundcubemail* /www \
 && curl --remote-name http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types \
 && mkdir /config

COPY config.php php.ini run.sh /
CMD /run.sh
