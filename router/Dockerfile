# 使用官方 PHP 映像檔作為基底
FROM php:7.4-apache

# 複製你的 PHP 檔案到容器內的 /var/www 資料夾
COPY . /var/www/html

RUN rm -f description.md docker-compose.yml Dockerfile
RUN mv flag.txt /

# 安裝一些必要的套件（例如 MySQL 客戶端）
RUN apt-get update && apt-get install -y \
    libpq-dev 
RUN chmod 444 index.php login.php /flag.txt help.php logout.php


# 設定 Apache 的網站根目錄
ENV APACHE_DOCUMENT_ROOT /var/www/html
# 啟用 Apache 的 rewrite 模組
RUN a2enmod rewrite

RUN echo 'DirectoryIndex login.php' >> /etc/apache2/apache2.conf
# 指定容器啟動時要執行的指令
CMD ["apache2-foreground"]
