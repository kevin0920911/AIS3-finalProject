# 使用官方 PHP 映像檔作為基底
FROM php:7.4-apache

RUN useradd -d /home/web/ -m -p web -s /bin/bash web
RUN useradd -d /home/pwn/ -m -p pwn -s /bin/bash pwn

COPY flag /
RUN chown pwn /flag
# 複製你的檔案到容器內的 /var/www 資料夾
COPY Web/* /var/www/html
RUN chown web /var/www/html/*

COPY Pwn/* /home/pwn/


# 安裝必要的套件
RUN apt-get update && apt-get install -y \
    libpq-dev

# 設定文件權限
RUN chmod 444 index.php login.php help.php logout.php
RUN chmod 777 uploads

# 設定 Apache 的網站根目錄
ENV APACHE_DOCUMENT_ROOT /var/www/html

# 啟用 Apache 的 rewrite 模組
RUN a2enmod rewrite

# 設定 Apache 默認頁面
RUN echo 'DirectoryIndex login.php' >> /etc/apache2/apache2.conf



# 創建清理腳本
RUN echo '#!/bin/bash\nrm -rf /var/www/html/uploads/*' > /usr/local/bin/cleanup.sh
RUN chmod +x /usr/local/bin/cleanup.sh




USER pwn

RUN chmod 400 /flag
RUN chmod 555 /home/pwn/read_file
RUN chmod u+s /home/pwn/read_file

USER web

# 啟動 Cron 和 Apache
CMD ["bash", "-c", "apache2-foreground"]
