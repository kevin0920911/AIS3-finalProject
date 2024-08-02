FROM ubuntu:22.04

RUN apt-get update && apt-get install -y openssh-server file

RUN useradd -m hacker && echo 'hacker:hacker' | chpasswd
COPY chroot /chroot
COPY flag /flag
RUN chmod 400 /flag
RUN chmod 555 /chroot
RUN chmod u+s /chroot

# 設置 SSH 服務
RUN mkdir /var/run/sshd

EXPOSE 22

CMD ["/usr/sbin/sshd", "-D"]
