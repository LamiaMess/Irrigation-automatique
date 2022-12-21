import serial
import time
 
ser = serial.Serial('COM10', 9600, timeout=1)
time.sleep(2) #try 2
 
#insert data to sql database
import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="root",
  database="proinfo"
) 
data =[] 
while True: # 8 datas* 5 valeurs pour chacune  try: for infinite data while True:  for i in range(40)
    ser.flush()
    b = ser.readline()         # read a byte string
    string_n = b.decode()  # decode byte string into Unicode  
    string = string_n.rstrip() # remove \n and \r
   
    flt = float(string)        # convert string to float
    print("flt")
    print(flt)
    
    data.append(flt)           # add to the end of data list
    time.sleep(0.1)           # wait (sleep) 0.1 seconds
    print("data")
    print(data)
    if(len(data)==8):
        mycursor = mydb.cursor()
        sql = "INSERT INTO datacap (tauxhumidite,temperature,temperatureresentie,humsol1,humsol2,humsol3,humair,luminosite) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)"
        val = (data[0],data[1],data[2],data[3],data[4],data[5],data[6],data[7],)
        mycursor.execute(sql, val)

        mydb.commit()
        data=[]
        print(mycursor.rowcount, "record inserted.")
        mycursor = mydb.cursor()
        time.sleep(2)# 8 or 16 works well
         
             
        mycursor.execute("SELECT arroser from datacap ")
        myresult = mycursor.fetchall()
        time.sleep(6)
        ser.flush()
        for x in myresult:
            print(str(x[0]))
            ser.write( str(x[0]).encode())
        

    

    
        
        
ser.close()




# show the data


 


# In[ ]:





# In[11]:





# In[41]:





# In[ ]:




