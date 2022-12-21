#include <DHT.h>
#define brocheDeBranchementDHT 44    // La ligne de communication du DHT22 sera donc branchée sur la pin D6 de l'Arduino
#define typeDeDHT DHT22             // Ici, le type de DHT utilisé est un DHT22 (que vous pouvez changer en DHT11, DHT21, ou autre, le cas échéant)
#include "SoftwareSerial.h"


SoftwareSerial XBee(10,11); //Tx Rx
// Instanciation de la librairie DHT
DHT dht(brocheDeBranchementDHT, typeDeDHT);
float detection;


int capteur=A3;
int PinAnalogiqueHumidite0=9;       //Broche Analogique de mesure d'humidité
int PinAnalogiqueHumidite1=10;
int PinAnalogiqueHumidite2=11;
int capteurpluie=12;
float capteurluminosite=8;
//int PinNumeriqueHumidite=2;        //Broche Numérique mesure de l'humiditéint PinLed=3;    //LED témoin de seuilde  sécheresse


float hsol1;  //Humidite su sol, mesure analogique
float hsol2;
float hsol3;
int capteur_lum = 8; // capteur branché sur le port 0
int analog_lum; // valeur analogique envoyé par le capteur
char state;
// ========================
// Initialisation programme
// ========================
void setup () {
  
  // Initialisation de la liaison série (pour retourner les infos au moniteur série de l'ordi)
  Serial.begin(9600);
  XBee.begin(9600);

  //Serial.println("Programme de test du DHT22");
  //Serial.println("==========================");
 // Serial.println();
  pinMode(PinAnalogiqueHumidite0, INPUT);       //pin A0 en entrée analogique
  pinMode(PinAnalogiqueHumidite1, INPUT);  
  pinMode(PinAnalogiqueHumidite2, INPUT); 
  pinMode(capteur,INPUT); 
   pinMode(10, OUTPUT);
   pinMode(14, OUTPUT);
  
digitalWrite(14 ,HIGH); 
  // Initialisation du DHT22;
  dht.begin();
  
}
 
// =================
// Boucle principale
// =================
void loop () {
    if (Serial.available() > 0) {
    // read the incoming byte:
    state = Serial.read();

    // say what you got:
   
    if(state=='m'){         
      digitalWrite(14 ,LOW); 
      
      delay(2000);
      }
     else if(state=='n'){         
      digitalWrite(14 ,HIGH); 
      Serial.println(state);
      delay(2000);
      }   
  }
  // Lecture des données
  float tauxHumidite = dht.readHumidity();              // Lecture du taux d'humidité (en %)
  float temperatureEnCelsius = dht.readTemperature();   // Lecture de la température, exprimée en degrés Celsius

//  Vérification si données bien reçues
  if (isnan(tauxHumidite) || isnan(temperatureEnCelsius)) {
    //Serial.println("Aucune valeur retournée par le DHT22. Est-il bien branché ?");
   delay(2000);
    return;         // Si aucune valeur n'a été reçue par l'Arduino, on attend 2 secondes, puis on redémarre la fonction loop()
 }

  // Calcul de la température ressentie
  float temperatureRessentieEnCelsius = dht.computeHeatIndex(temperatureEnCelsius, tauxHumidite, false); // Le "false" est là pour dire qu'on travaille en °C, et non en °F
  
  // Affichage des valeurs
  //Serial.print("Humidité = ");
  Serial.println(tauxHumidite); //Serial.println(" %");
  //Serial.print("Température = "); 
  Serial.println(temperatureEnCelsius); //Serial.println(" °C");
  //Serial.print("Température ressentie = "); 
  Serial.println(temperatureRessentieEnCelsius); //Serial.println(" °C");
  hsol1 = analogRead(PinAnalogiqueHumidite0); // Lit la tension analogique
 hsol2 = analogRead(PinAnalogiqueHumidite1);
  hsol3 = analogRead(PinAnalogiqueHumidite2);
 
  //secheresse = digitalRead(PinNumeriqueHumidite);
   // Serial.println(" Valeur de l'humidite de sol  ");
    //Serial.println( "Valeur en premier niveau " );
    Serial.println(hsol1*100/1023);
    //Serial.println("Valeur en deuxieme niveau " );
    Serial.println(hsol2*100/1023);
    //Serial.println("Valeur en troisieme niveau ");
    Serial.println(hsol3*100/1023);// afficher la mesure
    //Serial.println("  ");

  detection=analogRead(capteur); // on lit la broche capteur "analogique"
  //Serial.print("Valeur de l'humidite de l'air = ");
  Serial.println(detection);
  analog_lum = analogRead(capteur_lum); // lecture de la valeur analogique, qu'on enregistre dans analog_lum
  //Serial.println("Valeur luminosité = ");
  Serial.println(analog_lum); 





       
 //Serial.println("  ");
  XBee.write(tauxHumidite);
  XBee.write(detection);
   XBee.write(analog_lum);
    XBee.write(hsol1);
    XBee.write(hsol2);
    XBee.write(hsol3);
//Serial.println("lllllllllllll ");    
//Serial.print(XBee.write(tauxHumidite));
//Serial.print(XBee.write(analog_lum));
  // Temporisation de 2 secondes (pour rappel : il ne faut pas essayer de faire plus d'1 lecture toutes les 2 secondes, avec le DHT22, selon le fabricant)
  delay(2000);
}