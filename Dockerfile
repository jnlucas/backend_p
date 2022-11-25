FROM centos:7

USER root

# MSSQL Drivers
RUN yum -y update
RUN yum -y install deltarpm
RUN curl https://packages.microsoft.com/config/rhel/7/prod.repo > /etc/yum.repos.d/mssql-release.repo
RUN ACCEPT_EULA=Y yum -y install msodbcsql mssql-tools
RUN yum -y install unixODBC-devel gcc-c++ gcc autoconf automake

# Apache
RUN yum -y install httpd

# PHP 7.2
RUN yum -y install epel-release yum-utils
RUN yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum-config-manager --enable remi-php72
RUN yum -y install php php-cli php-common php-pdo php-devel php-fpm php-mbstring php-mcrypt php-pear php-sqlsrv

# Composer
RUN yum -y install composer

#COPY httpd/httpd.conf /etc/httpd/conf

# Start httpd
CMD ["/usr/sbin/httpd","-D","FOREGROUND"]
