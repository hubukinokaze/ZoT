import serial
import time
import mysql.connector
import urllib.request

cnx = mysql.connector.connect(user='alfonsoaranzazu', password='Broncos7',
                              host='informatics117.cjtlenhgjvw5.us-west-1.rds.amazonaws.com',
                              port='3306',
                              database="informatics117db")
cursor = cnx.cursor()


def read_moisture_data(ser):
    moisture = ser.readline().strip().decode()
    date = time.strftime("%m/%d/%y")
    current_time = time.strftime("%H:%M")
    watered = ser.readline().strip().decode()
    return date, current_time, moisture, watered

def get_username_flower():
    "get the data from the text file on the web"
    url = urllib.request.urlopen("http://default-environment-nk2mjs3aen.elasticbeanstalk.com/current_plant.txt")
    username_flower = url.readline().decode()
    username_flower_list = username_flower.split(";")
    username = username_flower_list[0]
    flower = username_flower_list[1]
    return (username, flower)

def send_to_database(username,flower, data):
    "sends three tuple info to the database table"
    insert_command ='''INSERT INTO moisture_levels(username, flower, date, time, moisture_level, watered)
        VALUES(''' + "'"+username+ "','" +flower+"','" +data[0]+ "','" +data[1]+ "','" +data[2]+ "','" +data[3]+ "')"                 
    print(username,flower,data[0],data[1],data[2],data[3])
    try:
        #execute command
        cursor.execute(insert_command)

        #commit code
        cnx.commit()
    except:
        print("error")


if "__main__" == __name__:
    # COM4 - ARDUINO
    # COM6 - XBEE
    ser = serial.Serial("COM6", 9600)
    print("preparing to send data...")
    counter = 0
    while (counter < 10):
        moisture_data = read_moisture_data(ser) #date, current_time, moisture_level, watered
        username,flower = get_username_flower()
        
        send_to_database(username, flower, moisture_data)
        counter += 1
        
    
    
    
    
