import mysql.connector

cnx = mysql.connector.connect(user='alfonsoaranzazu',
                              password='Broncos7',
                              host='informatics117db.cjtlenhgjvw5.us-west-1.rds.amazonaws.com')
                            
cnx.close()


# it's not going to connect to the database right now, because of my ip address
# I need to go to the settings on the aws account, and allow my ip address to use MySQL statements
# I connected to the database at home, created a table, and put in data
