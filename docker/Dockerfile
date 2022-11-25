FROM centos:7

USER root

# ADD EPEL E REPO PHP 7
RUN yum -y install epel-release yum-utils httpd mod_ssl
RUN curl https://packages.microsoft.com/config/rhel/7/prod.repo > /etc/yum.repos.d/mssql-release.repo && \
    yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm && \
    yum-config-manager --enable remi-php72
RUN yum -y update

#INSTALL MSQLTOOLS
RUN ACCEPT_EULA=Y yum -y install msodbcsql mssql-tools unixODBC-devel gcc-c++ gcc autoconf automake deltarpm

# INSALL PHP
RUN yum -y install php php-cli php-common php-pdo php-devel php-fpm php-mbstring php-mcrypt php-pear php-sqlsrv composer 

# settings ssl/com ssl na infa
#COPY httpd/httpd.conf /etc/httpd/conf
#COPY httpd/ssl.conf /etc/httpd/conf.d/
#RUN mkdir /etc/httpd/ssl_certs
#COPY certs/* /etc/httpd/ssl_certs/

# Start httpd
CMD ["/usr/sbin/httpd","-D","FOREGROUND"]