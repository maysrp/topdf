import os,json,pymysql
def doo(s):
    re={}
    c=s.strip()
    re['end']=c
    if len(c)==0:
        re['status']=True
    else:
        re['status']=False
    return re

config={}


def login():
    dbPassword=True
    dbUser=True
    dbName=True
    global config
    while dbName:
        re=doo(input("put your dbName:"))
        config["dbName"]=re['end']
        dbName=re['status']
    while dbUser:    
        re=doo(input("put your dbUser:"))
        config["dbUser"]=re['end']
        dbUser=re['status']
    while dbPassword:
        re=doo(input("put your dbPassword:"))
        config["dbPassword"]=re['end']
        dbPassword=re['status']


def doing():
    try:
        global config
        login()
        info=config
        db = pymysql.connect("localhost",info['dbUser'],info['dbPassword'],info['dbName'] )
        os.system("mysql -u%s -p%s %s <../gaoji.sql" % (info['dbUser'],info['dbPassword'],info['dbName']))
        js=json.dumps(config)
        with open("../config.json",'w') as f:
            f.write(js)
        print('+++++++++++++++++++++++++')
        print('++++++  SCUCCESS!  ++++++')
        print('+++++++++++++++++++++++++')
    except Exception as e:
        print("-------------------------")
        print("---DB connect error!!!---")
        print("---TRY AGAIN or CTRL+C---")
        print("-------------------------")
        doing()

doing()