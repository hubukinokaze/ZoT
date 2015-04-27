/*
  # Code for the Smart Irrigation project
  # Editor     : Team ZoT
  # Date       : 3/7/2015

  # the sensor value description
  # 0  ~300     dry soil
  # 300~700     humid soil
  # 700~950     in water
  # NOTE: range of value changes in soil due to surface area.
*/

int pos;
int myservopin = 9;
boolean watered = false;

#include <Servo.h> 
 
Servo myservo;  // create servo object to control a servo 

void setup()
{
  
  Serial.begin(9600);
  myservo.attach(9); //attaches the servo on pin 9 to the servo object
    
}

void loop(){
  
  boolean isWatered = false;
    
  while (true){
    int moisture = analogRead(A0);
    watered = false;
    
    if (moisture < 580){ // water plant if moisture level <200 or change to whatever
      if (!isWatered){
        myservo.attach(9);
        for(pos = 0; pos < 180; pos += 1) //loop to rotate servo
        {
          myservo.write(pos);
          delay(150);
        }
        myservo.detach(); //stops motor    
        watered = true; //end watering function
        isWatered = true;
        Serial.println(moisture);
        Serial.println(watered); //print moisture level and watered (watered should be true)
      } else{ // if it WAS watered
        Serial.println(moisture); // should be < 300
        Serial.println(watered); //should be false
      }
    } 
    else{ //moisture > 300
      isWatered = false;
      Serial.println(moisture);
      Serial.println(watered);
    }
    delay(2000);
  }  
}
