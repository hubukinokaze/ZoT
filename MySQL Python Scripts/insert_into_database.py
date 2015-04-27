import mysql.connector
from mysql.connector import errorcode

cnx = mysql.connector.connect(user='alfonsoaranzazu', password='Broncos7',
                              host='informatics117db.cjtlenhgjvw5.us-west-1.rds.amazonaws.com',
                              port='3306',
                              database="informatics117db")
cursor = cnx.cursor()


add_user = ("INSERT INTO accounts "
               "(username, password) "
               "VALUES (%s, %s)")

data_user = ('alfonsoaranzazu', 'Broncos7')

#Insert new employee
cursor.execute(add_user, data_user)
user_number = cursor.lastrowid

#Make sure data is committed to the database
cnx.commit()

#print("Surver information: " + str(cnx.get_server_info()))

cursor.close()
cnx.close()
