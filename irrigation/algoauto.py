# Hypothèses Maroc Région orientale  et legumes potagers

#les valeurs du capteur
HumSol = 0  
Lum =0
temp=0
Pluie=0

#type de sol et plante  
typesol="Humide"
typeplante="classe1"  # changer dans la plateforme uniq potagers et diviser selon 3 classes selon besoin d'eau  

#sol sabuleux sèche vite 



# modèle matrhématiquer a*b*durée = durée d'arrosage add src for ce modèle




# l'algorithme commence par type de sol et plante et donne la durée d'arrosage 


# s'il ya la  pluie ou c'est le matin pas d'irrigation  
def pluiematinexiste(pluie,Lum):

    a=pluie*Lum

    if(a==1): return 0 
    
    else : return 1

#durée indépendante au types de sol /plante selon l'approximationxxx 
def duree(HumSol,temp):
    durée=0
    if pluiematinexiste ==1:
        if temp<24 & HumSol<60:
            durée=25
        elif  temp<60 & HumSol>80:
            durée= 30
        elif  temp<24 & HumSol<60:
            durée= 25
        else:  durée=20
    return durée          


# ces valeurs varient selon le besoin fdes plantes à l'eau 
def facteurplante(typeplante):
    k=0 
    match typeplante:
        case "classe1":
            k=1,2
        case "classe2":
            k=1,3
        case "classe3":
            k=1,36  

    return k


# ces valeurs varient selon le ph du sol src: https://www.u-picardie.fr/beauchamp/mst/eau-sol.htm
def facteursol(typesol):
    k=0 
    match typesol:
        case "humide":
            k=0,9
        case "sabuleux":
            k=0,8
        case "argileux":
            k=1,23
        case "limoneux":
            k=1,2       

    return k

def main():
    k=facteurplante(typesol)
    m=facteurplante(typesol)
    dure=duree(HumSol,temp)
    return k*m*dure
    




