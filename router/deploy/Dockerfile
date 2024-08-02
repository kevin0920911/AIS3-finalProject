# 使用官方 PHP 映像檔作為基底
FROM php:7.4-apache

RUN useradd -d /home/web/ -m -p web -s /bin/bash web
RUN useradd -d /home/pwn/ -m -p pwn -s /bin/bash pwn

COPY flag /
RUN chown pwn:pwn /flag
# 複製你的檔案到容器內的 /var/www 資料夾
COPY Web/* /var/www/html/
RUN mkdir /var/www/html/uploads
RUN chown web:web /var/www/html/*

COPY Pwn/read_file.c /home/pwn/read_file.c
RUN chown pwn:pwn /home/pwn/read_file.c


# 安裝必要的套件
RUN apt-get update && apt-get install -y \
    libpq-dev \
    gcc \
    libseccomp-dev

# 設定 Apache 的網站根目錄
ENV APACHE_DOCUMENT_ROOT /var/www/html

# 啟用 Apache 的 rewrite 模組
RUN a2enmod rewrite

# 設定 Apache 默認頁面
RUN echo 'DirectoryIndex login.php' >> /etc/apache2/apache2.conf



USER pwn

RUN chmod 400 /flag
RUN gcc -o /home/pwn/read_file /home/pwn/read_file.c -lseccomp
RUN chmod 555 /home/pwn/read_file
RUN chmod u+s /home/pwn/read_file

USER web

# 啟動 Cron 和 Apache
CMD ["bash", "-c", "apache2-foreground"]
