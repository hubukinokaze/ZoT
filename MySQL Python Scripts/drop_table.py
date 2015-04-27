#drop table
import mysql.connector
cnx = mysql.connector.connect(user='alfonsoaranzazu', password='Broncos7',
                              host='informatics117db.cjtlenhgjvw5.us-west-1.rds.amazonaws.com',
                              port='3306',
                              database='informatics117db')
cursor = cnx.cursor()

command = ("DROP TABLE accounts")

cursor.execute(command)
