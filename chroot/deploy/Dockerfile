FROM ubuntu:22.04

RUN apt-get update && apt-get install -y openssh-server file

RUN useradd -m hacker && echo 'hacker:hacker' | chpasswd
COPY chroot /chroot
COPY flag /flag
RUN chmod 400 /flag
RUN chmod 555 /chroot
RUN chmod u+s /chroot

# 修改或任何方式得到他人 payload 視為作弊
RUN echo "unset HISTFILE\n\
export HISTSIZE=0\n\
export HISTFILESIZE=0\n\
export HISTCONTROL=ignoredups:erasedups\n\
export HISTIGNORE='*'" >> /home/hacker/.bashrc
RUN touch /etc/profile && chown root:root /etc/profile && chmod 555 /etc/profile
RUN touch /home/hacker/.profile && chown root:root /home/hacker/.profile && chmod 555 /home/hacker/.profile
RUN touch /home/hacker/.bashrc && chown root:root /home/hacker/.bashrc && chmod 555 /home/hacker/.bashrc
RUN touch /home/hacker/.bash_profile && chown root:root /home/hacker/.bash_profile && chmod 555 /home/hacker/.bash_profile
RUN touch /home/hacker/.bash_login && chown root:root /home/hacker/.bash_login && chmod 555 /home/hacker/.bash_login
RUN touch /home/hacker/.bash_logout && chown root:root /home/hacker/.bash_logout && chmod 555 /home/hacker/.bash_logout
#########

RUN mkdir /var/run/sshd

EXPOSE 22

CMD ["/usr/sbin/sshd", "-D"]
