# 使用官方 PHP 映像檔作為基底
FROM php:7.4-apache

# 複製你的 PHP 檔案到容器內的 /var/www 資料夾
COPY . /var/www/html

# 安裝一些必要的套件（例如 MySQL 客戶端）
RUN apt-get update && apt-get install -y \
    libpq-dev 

# 設定 Apache 的網站根目錄
ENV APACHE_DOCUMENT_ROOT /var/www/html
# 啟用 Apache 的 rewrite 模組
RUN a2enmod rewrite

# 指定容器啟動時要執行的指令
CMD ["apache2-foreground"]
