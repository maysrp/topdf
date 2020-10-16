import os
import time
from pathlib import Path
import shutil
from os.path import join, getsize
import uuid,hashlib
import pymysql
import shutil
import json



webdir="/home/wwwroot/pdf.gaoji.me/"

os.chdir(webdir)
# 修改工作目录

with open('config.json') as f:
    info=json.loads(f.read())
os.chdir("public/")


# print(info)

def topdf(nfile):
    com="libreoffice --convert-to pdf:writer_pdf_Export "+nfile+" --outdir download"
    os.system(com)
    name=nfile[nfile.rfind('/')+1:nfile.rfind('.')]+".pdf"
    newa="/download/"+name
    return newa 

db = pymysql.connect("localhost",info['dbUser'],info['dbPassword'],info['dbName'] )
cursor = db.cursor()


while 1:
    cursor.execute("SELECT tid,yz,task_type,task_do,error_info from cmf_tasks where task_do=0 and isnull(error_info) and del=0")
    db.commit()
    data = cursor.fetchone()
    if data:
        tid=data[0]
        yz=data[1]
        task_type=data[2]
        SQL="SELECT file_url FROM cmf_files WHERE tid='%s'" % (tid,)
        cursor.execute(SQL)
        datas = cursor.fetchall()
        if datas:
            SQL_I="UPDATE cmf_tasks SET task_do='%i' WHERE tid='%i'" % (int(time.time()),tid)
            cursor.execute(SQL_I)
            db.commit()
            if task_type in [4,5,6,7]:
                try:
                    rd=topdf("./upload/"+datas[0][0])
                except Exception as e:
                    SQL_E="UPDATE cmf_tasks SET error_info='%i' WHERE tid='%i'" % (int(time.time()),tid)
                    cursor.execute(SQL_E)
                    db.commit()
            SQL_D="UPDATE cmf_tasks SET task_done='%i',download_url='%s' WHERE tid='%i'" % (int(time.time()),rd,tid)
            cursor.execute(SQL_D)
            db.commit()
        else:
            SQL_E="UPDATE cmf_tasks SET error_info='%i' WHERE tid='%i'" % (int(time.time()),tid)
            cursor.execute(SQL_E)
            db.commit()
    else:
        time.sleep(1)
db.close()
