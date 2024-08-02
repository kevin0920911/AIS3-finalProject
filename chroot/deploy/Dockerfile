FROM ubuntu:22.04

RUN apt-get update && apt-get install -y openssh-server gcc

RUN useradd -m hacker && echo 'hacker' | chpasswd
COPY chroot /root/chroot
RUN chmod 555 /root/chroot
RUN chmod u+s /root/chroot

# 設置 SSH 服務
RUN mkdir /var/run/sshd
RUN echo 'PermitRootLogin no' >> /etc/ssh/sshd_config
RUN echo 'PasswordAuthentication yes' >> /etc/ssh/sshd_config
RUN echo 'ChallengeResponseAuthentication no' >> /etc/ssh/sshd_config

EXPOSE 22

CMD ["/usr/sbin/sshd", "-D"]
