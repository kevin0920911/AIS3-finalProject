# 使用官方 PHP 映像檔作為基底
FROM php:7.4-apache

# 複製你的 PHP 檔案到容器內的 /var/www 資料夾
COPY . /var/www/html

# 安裝必要的套件
RUN apt-get update && apt-get install -y \
    libpq-dev \
    cron



RUN mv flag /

# 設定文件權限
RUN chmod 444 index.php login.php /flag help.php logout.php
RUN chmod 777 uploads
# 設定 Apache 的網站根目錄
ENV APACHE_DOCUMENT_ROOT /var/www/html

# 啟用 Apache 的 rewrite 模組
RUN a2enmod rewrite

# 設定 Apache 默認頁面
RUN echo 'DirectoryIndex login.php' >> /etc/apache2/apache2.conf

# 複製定時任務腳本
COPY cleanup-cron /etc/cron.d/cleanup-cron

# 給予腳本執行權限
RUN chmod 0644 /etc/cron.d/cleanup-cron

# 應用定時任務
RUN crontab /etc/cron.d/cleanup-cron

# 創建清理腳本
RUN echo '#!/bin/bash\nrm -rf /var/www/html/uploads/*' > /usr/local/bin/cleanup.sh
RUN chmod +x /usr/local/bin/cleanup.sh

# 啟動 Cron 和 Apache
CMD ["bash", "-c", "service cron start && apache2-foreground"]
