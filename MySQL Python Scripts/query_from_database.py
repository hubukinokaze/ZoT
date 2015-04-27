#Query data from Database
import mysql.connector

cnx = mysql.connector.connect(user='alfonsoaranzazu', password='Broncos7',
                              host='informatics117db.cjtlenhgjvw5.us-west-1.rds.amazonaws.com',port='3306',
                              database="informatics117db")
cursor = cnx.cursor()


query = ("SELECT * FROM accounts ")
#query = ("SELECT * FROM moisture_levels")

cursor.execute(query)

for data in cursor:
#for (user_name, password) in cursor:
    #print("username: {}  and password: {}".format(user_name, password))
    print(data)

cursor.close()
cnx.close()

