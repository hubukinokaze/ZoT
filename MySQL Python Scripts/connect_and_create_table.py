import mysql.connector
from mysql.connector import errorcode

cnx = mysql.connector.connect(user='alfonsoaranzazu', password='Broncos7',
                              host='informatics117db.cjtlenhgjvw5.us-west-1.rds.amazonaws.com',
                              port='3306')
cursor = cnx.cursor()


DB_NAME = "informatics117db"
TABLES = {}


TABLES['users'] = (
    "CREATE TABLE `users` ("
    "   `user_number` int(11) NOT NULL AUTO_INCREMENT,"
    "   `user_name` varchar(14) NOT NULL,"
    "   `password` varchar(16) NOT NULL,"
    "   PRIMARY KEY (`user_number`)"
    ")  ENGINE=InnoDB")




def create_database(cursor):
    print('creating database...')
    try:
        cursor.execute(
            "CREATE DATABASE {} DEFAULT CHARACTER SET 'utf8'".format(DB_NAME))
        print('finished creating database...')
    except mysql.connector.Error as err:
        print("Failed creating database: {}".format(err))
        exit(1)

try:
    cnx.database = DB_NAME
except mysql.connector.Error as err:
    if err.errno == errorcode.ER_BAD_DB_ERROR:
        create_database(cursor)
        cnx.database = DB_NAME
    else:
        print(err)
        exit(1)


for name, ddl in TABLES.items():
    try:
        print("Creating table {}: ".format(name), end='')
        cursor.execute(ddl)
    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_TABLE_EXISTS_ERROR:
            print("table: " + name + "already exists")
        else:
            print(err.msg)
    else:
        print("OK")

cursor.close()
cnx.close()
    
        
