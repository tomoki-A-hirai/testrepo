# Error response from daemon: cgroups: cannot found cgroup mount destination: unknown.

ホスト環境
OS:windows 10 Home x64
RAM:16GB
CPU: corei5-3350P
Docker version :18.03.0-ce

使用ソフト
docker tool box(Docker Quickstart Terminal)
minGW64

参考サイトを見てhttpdを起動するコンテナを作成するために以下のDockerfileを  
~/username/work/dir/　  
に作成


>`# どのイメージを基にするか`    
>`FROM centos`  
>`MAINTAINER Admin <admin@admin.com>`  
>`# RUN: buildするときに実行される`  
>`# RUN echo "now building..."`  
>`# CMD: runするときに実行される`  
>`CMD echo "now running..."`  
>`# httpdのインストール`  
>`RUN yum install -y httpd`  
>`ADD ./index.html /var/www/html/`  
>`#ポート80を開ける`  
>`EXPOSE 80`  
>`#runした時にapache起動`  
>`CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]`  

その後、~/username/work/dir/　で  
`docker build -t admin/httpd ./`  
を実行する。
イメージ作成に成功し起動するがapacheからの応答を確認できず失敗とした。


次に別のサイトを参考にnginxを起動するためのDockerfileを作成
イメージ作成に成功するが、runに失敗
その時のエラーがタイトルのもので  
`Error response from daemon: cgroups: cannot found cgroup mount destination: unknown.`  
と出力された。
linux コマンドのエミュレート？のための？control group のマウント先が見つからないということなのでその後どのイメージを起動しようとしてみても動かない
尚、関係はないと思われるがhttpdの失敗とnginxの失敗の間にホスト機にvagrantをインストールしていろいろやっている。

ただ、docker tool boxのコンフィグをいじった記憶はないし、vagrantのインストールでその辺がいじられたというのも考えにくいか。。。

20180429現在根本的原因不明
なぜかminGW64を再起動(exit してから docker tool box shortcut double click)すると何事もなかったかのようにコンテナをrunさせることができる。
う～ん謎だ。。。
