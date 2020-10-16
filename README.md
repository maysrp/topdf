# topdf

#### 准备
office文档在线转换pdf平台
基于ThinkPHP5.1下的ThinkCMS5.1开发，只有word，excel，ppt，txt,文本在线转pdf的功能。  

Nginx php>7.1 mysql  
libreoffice python3


推荐安装lnmp.org一键安装包，lnmp安装完成后在php中添加fileinfo,之后按照以下命令按照libreoffice和pymysql  

`apt-get update`  
`apt-get install libreoffice python3-pip`  
`pip3 install pymysql`  

##### 字体安装

因为libreoffice转码时候需要字体，不然中文会全部乱码
`mkdir /usr/share/fonts/Fonts`
上传字体到这个目录（/usr/share/fonts/Fonts），字体哪里找？  
你的 C:\Windows\Fonts 下面的字体你上传几个就好了，推荐雅黑，宋体，黑体
#### Nginx  

nginx修改fastcgi.conf配置  
>lnmp下该文件在 `/usr/local/nginx/conf/fastcgi.conf`  

把其中的  
```
#fastcgi_param PHP_ADMIN_VALUE "open_basedir=$document_root/:/tmp/:/proc/";
fastcgi_param PHP_ADMIN_VALUE "open_basedir=$document_root/../:/tmp/:/proc/";
```


Nginx 配置
修好你的nginx的网站配置文件  
`vim /usr/local/nginx/conf/vhost/你的网站.conf`

在root那行,最后添加上/public,如下的代码形式，定义web的根目录为public
`root  /home/wwwroot/www.yunbt.net/public;`

#### 安装
##### 网站安装

下载该项目文件到你的网站目录上，给予data目录 和public/upload , public/download , public/plugins , public/themes , 权限为777   
转到你网站的根目录中的python目录下，执行`python3 install.py`按照提示依次输入数据库用户名，数据库名，数据库密码，即可完成网站的安装。

##### 转码服务端安装
修改python目录下的 run.py和screen.py 中13行代码 设置为你的网站的根目录。  
`webdir="/home/wwwroot/pdf.gaoji.me/"`  
run.py使用crontab 去每分钟执行一次去处理文档的转码。  
screen.py是使用screen来保持进程，可以做到按秒处理。  
推荐使用screen  
`screen -d pdf python3 screen.py`

#### 大功告成




