# 使用官方 PHP 映像檔作為基底
FROM php:7.4-apache

RUN useradd -d /home/web/ -m -p web -s /bin/bash web
RUN useradd -d /home/pwn/ -m -p pwn -s /bin/bash pwn

COPY flag /
RUN chown pwn:pwn /flag && chmod 400 /flag

COPY Web/* /var/www/html/
RUN mkdir /var/www/html/uploads
RUN chown web:web /var/www/html/*

COPY Pwn/read_file.c /home/pwn/read_file.c
RUN chown pwn:pwn /home/pwn/read_file.c

RUN apt-get update && apt-get install -y \
    libpq-dev \
    gcc \
    libseccomp-dev

ENV APACHE_DOCUMENT_ROOT /var/www/html

RUN echo 'DirectoryIndex login.php' >> /etc/apache2/apache2.conf

# 修改或任何方式窺探他人 payload 視為作弊
# 若存在相關漏洞，請通知主辦單位
RUN echo "unset HISTFILE\n\
export HISTSIZE=0\n\
export HISTFILESIZE=0\n\
export HISTCONTROL=ignoredups:erasedups\n\
export HISTIGNORE='*'" >> /home/web/.bash_profile
RUN touch /home/web/.profile && chown root:root /home/web/.profile && chmod 555 /home/web/.profile
RUN touch /home/web/.bashrc && chown root:root /home/web/.bashrc && chmod 555 /home/web/.bashrc
RUN touch /home/web/.bash_profile && chown root:root /home/web/.bash_profile && chmod 555 /home/web/.bash_profile
RUN touch /home/web/.bash_login && chown root:root /home/web/.bash_login && chmod 555 /home/web/.bash_login
RUN touch /home/web/.bash_logout && chown root:root /home/web/.bash_logout && chmod 555 /home/web/.bash_logout

RUN echo "unset HISTFILE\n\
export HISTSIZE=0\n\
export HISTFILESIZE=0\n\
export HISTCONTROL=ignoredups:erasedups\n\
export HISTIGNORE='*'" >> /home/pwn/.bashrc
RUN touch /home/pwn/.profile && chown root:root /home/pwn/.profile && chmod 555 /home/pwn/.profile
RUN touch /home/pwn/.bashrc && chown root:root /home/pwn/.bashrc && chmod 555 /home/pwn/.bashrc
RUN touch /home/pwn/.bash_profile && chown root:root /home/pwn/.bash_profile && chmod 555 /home/pwn/.bash_profile
RUN touch /home/pwn/.bash_login && chown root:root /home/pwn/.bash_login && chmod 555 /home/pwn/.bash_login
RUN touch /home/pwn/.bash_logout && chown root:root /home/pwn/.bash_logout && chmod 555 /home/pwn/.bash_logout
RUN touch /etc/profile && chown root:root /etc/profile && chmod 555 /etc/profile
#########


USER pwn
RUN gcc -o /home/pwn/read_file /home/pwn/read_file.c -lseccomp
RUN chmod 555 /home/pwn/read_file && chmod u+s /home/pwn/read_file

USER web

CMD ["bash", "-c", "apache2-foreground"]
