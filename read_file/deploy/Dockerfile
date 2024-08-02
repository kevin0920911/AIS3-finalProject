FROM ubuntu:22.04


RUN apt-get update && apt-get install -y \
    openssh-server \
    gcc \
    && rm -rf /var/lib/apt/lists/*

# 創建 hacker 用戶和設置 read_file 執行檔
RUN useradd -m hacker && echo 'hacker:hacker' | chpasswd
ADD ../dist/read_file /home/hacker/read_file
RUN chown hacker:hacker /home/hacker/read_file && chmod +x /home/hacker/read_file


# 設置 SSH 服務
RUN mkdir /var/run/sshd
RUN echo 'PermitRootLogin no' >> /etc/ssh/sshd_config
RUN echo 'PasswordAuthentication yes' >> /etc/ssh/sshd_config
RUN echo 'ChallengeResponseAuthentication no' >> /etc/ssh/sshd_config

# 設置用戶只讀權限
RUN chown -R root:root /home/hacker && chmod 755 /home/hacker

# 添加 read_only_shell 腳本
RUN echo "alias cd='echo Access Denied'" >> /home/hacker/.bashrc
RUN echo "alias mkdir='echo Access Denied'" >> /home/hacker/.bashrc
RUN echo "alias rm='echo Access Denied'" >> /home/hacker/.bashrc
RUN echo "alias mv='echo Access Denied'" >> /home/hacker/.bashrc
RUN echo "alias cp='echo Access Denied'" >> /home/hacker/.bashrc
RUN echo "alias touch='echo Access Denied'" >> /home/hacker/.bashrc

EXPOSE 22

CMD ["/usr/sbin/sshd", "-D"]
