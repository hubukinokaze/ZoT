import mysql.connector

cnx = mysql.connector.connect(user='alfonsoaranzazu', password='Broncos7',
                              host='informatics117db.cjtlenhgjvw5.us-west-1.rds.amazonaws.com',
                              port='3306')
                              #,database="informatics117db")
cursor = cnx.cursor()

def read_from_database():
    command = ("SELECT * FROM informatics117db.moisture_levels")
    #command = ("SELECT * FROM moisture_levels")
    cursor.execute(command)
    for data in cursor:
        print(data)

if "__main__" == __name__:
    read_from_database()
