# topdf
office文档在线转换pdf平台
基于ThinkPHP5.1下的ThinkCMS5.1开发，只有word，excel，ppt，txt,文本在线转pdf的功能。  

Nginx php>7.1 mysql  
libreoffice python3


推荐安装lnmp.org一键安装包，lnmp安装完成后在php中添加fileinfo,之后按照以下命令按照libreoffice和pymysql  

`apt-get update`  
`apt-get install libreoffice python3-pip`  
`pip3 install pymysql`  

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
下载该项目到你的网站目录上，给予data目录 和public/upload public/download public/plugins public/themes 权限为777
