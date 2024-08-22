# C6 - AIS3 Final Project
## Intro
這是AIS3 - C6組，進階攻防競技的營末專題，我們主要要出三題CTF題目，題目介紹
- advator：web題
- chrrot：pwn題
- router：web+pwn題
## Content
- 每一題大致上都有以下內容：
    ```
    .
    ├── deploy
    ├── dist
    └── exploit
    ```
    - deploy：docker compose的必要文件
    - dist：CTF玩家看到的題目資訊
    - explit：預期解的python程式，用之前請先`pip install requirement.txt`
## Usage
- Independence
    - docker
- 接著可以直接啟動
    ```bash
    docker-compose up --build 
    ```
- 連線資訊
    - advator: http://localhost:8003
    - chroot: ssh hacker@127.0.0.1 -p 8002
       - password: hacker 
    - router: http://localhost:8003
