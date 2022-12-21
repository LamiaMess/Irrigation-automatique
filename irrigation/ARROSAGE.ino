#include <Wire.h>
#include <SparkFunHTU21D.h>

char data;
float b=0;
int L;
float a;
float w;
char state;
HTU21D myHumidity;

 

void setup() {
  myHumidity.begin(); 
  pinMode(10, OUTPUT);
  // Serial.begin starts the serial connection between computer and Arduino
  Serial.begin(9600);
   
}

void loop() {
  b = (analogRead(A0)); 
    a=((b/1023)*100);
    w=(a*53)/99.7;
     
    L = (analogRead(A1)/4);
      float temp = myHumidity.readTemperature();
    float h = myHumidity.readHumidity();
    
    Serial.println(temp-972);
   Serial.println(w); 
   Serial.println(L);
      if(Serial.available()>0)
  { 
      b = (analogRead(A0)); 
    a=((b/1023)*100);
    w=(a*53)/99.7;
     
    L = (analogRead(A1)/4);
      float temp = myHumidity.readTemperature();
    float h = myHumidity.readHumidity();
    
    Serial.println(temp-972);
   Serial.println(w); 
   Serial.println(L);
    
     state = Serial.read();
 
  while(state=='m'){         
      digitalWrite(14 ,LOW);  
             state = Serial.read();          
      Serial.flush();  
      Serial.println(temp-972);
   Serial.println(w); 
   Serial.println(L); 
       
  }
  while(state=='n') {       
      digitalWrite(14 ,HIGH); 
 
      state = Serial.read(); 
      Serial.flush();
      
    Serial.println(temp-972);
   Serial.println(w); 
   Serial.println(L);
        
     
    

  
    }
  }
  // Give the server some time to recieve the data and store it. I used 10 seconds here. Be advised when delaying. If u use a short delay, the server might not capture data because of Arduino transmitting new data too soon.
  delay(1000);
}





 
