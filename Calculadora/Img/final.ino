#include <LiquidCrystal.h>
#include<stdio.h>
#include<stdlib.h>
// initialize the library with the numbers of the interface pins
LiquidCrystal lcd(1, 0, 5, 4, 3, 2);
String palabra="";
int numero;
double res=0;
boolean guardado=false;
int signo=9;
int anterior=123;
boolean inf=false;
void setup() {
  // set the digital pin as output:
 // set up the LCD's number of columns and rows: 
  lcd.begin(16, 2);
  // Print a message to the LCD.
  lcd.setCursor(0, 0);
  lcd.print("Super         :)");
  lcd.setCursor(0, 1);
  lcd.print("calculadora");
  pinMode(6, OUTPUT);  
  pinMode(7, OUTPUT);  
  pinMode(8, OUTPUT);  
  pinMode(9, OUTPUT);  
  pinMode(10, INPUT_PULLUP);  
  pinMode(11, INPUT_PULLUP);  
  pinMode(12, INPUT_PULLUP);    
  pinMode(13, INPUT_PULLUP);  
}
void loop()
{
  numero=20;
  
  for(int a=0;a<4;a++){
    if(a==0){
      digitalWrite(6,HIGH);
      digitalWrite(7,LOW);
      digitalWrite(8,LOW);
      digitalWrite(9,LOW);
      int pin13=digitalRead(13);
    int pin12=digitalRead(12);
    int pin11=digitalRead(11);
    int pin10=digitalRead(10);
      if(pin10==HIGH){
        numero=15;//1
      }
      else if(pin11==HIGH){
        numero=9;//4
      }
      else if(pin12==HIGH){
        numero=6;//7
      }
      else if(pin13==HIGH){
        numero=3;//14
      }
      
    }
    else if(a==1){
      digitalWrite(7,HIGH);
      digitalWrite(6,LOW);
      digitalWrite(8,LOW);
      digitalWrite(9,LOW);
      int pin13=digitalRead(13);
    int pin12=digitalRead(12);
    int pin11=digitalRead(11);
    int pin10=digitalRead(10);
      if(pin10==HIGH){
        numero=13;//2
      }
      else if(pin11==HIGH){
        numero=12;//5
      }
      else if(pin12==HIGH){
        numero=11;//8
      }
      else if(pin13==HIGH){
        numero=10;//0
      }
      
    }
    else if(a==2){
      digitalWrite(8,HIGH);
      digitalWrite(6,LOW);
      digitalWrite(7,LOW);
      digitalWrite(9,LOW);
      int pin13=digitalRead(13);
    int pin12=digitalRead(12);
    int pin11=digitalRead(11);
    int pin10=digitalRead(10);
      if(pin10==HIGH){
        numero=0;//3
      }
      else if(pin11==HIGH){
        numero=8;//6
      }
      else if(pin12==HIGH){
        numero=5;//9
      }
      else if(pin13==HIGH){
        numero=2;//15      
      }
      
    }
    else if(a==3){
      digitalWrite(9,HIGH);
      digitalWrite(6,LOW);
      digitalWrite(8,LOW);
      digitalWrite(7,LOW);
      int pin13=digitalRead(13);
    int pin12=digitalRead(12);
    int pin11=digitalRead(11);
    int pin10=digitalRead(10);
      if(pin10==HIGH){
        numero=14; //10      
      }
      else if(pin11==HIGH){
        numero=7; //11    
      }
      else if(pin12==HIGH){
        numero=4; //12       
      }
      else if(pin13==HIGH){
        numero=1; //13
      }
      
    }
    else{
      digitalWrite(7,LOW);
      digitalWrite(6,LOW);
      digitalWrite(8,LOW);
      digitalWrite(9,LOW);
    }
  }
  if(numero!=20){
    
    
    //--------------------------------------------------------------------------------------
    
    if (palabra.length() <= 16){
       
        if(numero==10){
          if(palabra!=""){
          if(guardado){
            if(signo==0){
              res=res+toint(palabra);
            }
            else if(signo==1){
              res=res-toint(palabra);
            }
            else if(signo==2){
              res=res*toint(palabra);
            }
            else if(signo==3){
              if(toint(palabra)==0){
                inf=true;
              }
              else{
                inf=false;
              }
            }
            else if(signo==6){
              res=toint(palabra);
            }
          }
          else{
            res=toint(palabra);
            guardado=true;
          }
        }
          palabra="";
          signo=0;
        
        }
        else if(numero==11){
          if(palabra!=""){
          if(guardado){
            if(signo==0){
              res=res+toint(palabra);
            }
            else if(signo==1){
              res=res-toint(palabra);
            }
            else if(signo==2){
              res=res*toint(palabra);
            }
            else if(signo==3){
              if(toint(palabra)==0){
                inf=true;
              }
              else{
                inf=false;
              }
            }
            else if(signo==6){
              res=toint(palabra);
            }
          }
          else{
            res=toint(palabra);
            guardado=true;
          }
          }
          palabra="";
          signo=1;
        }
        else if(numero==12){
          if(palabra!=""){
          if(guardado){
            if(signo==0){
              res=res+toint(palabra);
            }
            else if(signo==1){
              res=res-toint(palabra);
            }
            else if(signo==2){
              res=res*toint(palabra);
            }
            else if(signo==3){
              if(toint(palabra)==0){
                inf=true;
              }
              else{
                inf=false;
              }
              res=res/toint(palabra);
            }
            else if(signo==6){
              res=toint(palabra);
            }
          }
          else{
            res=toint(palabra);
            guardado=true;
          }
          }
          palabra="";
          signo=2;
          
          
        }
        else if(numero==13){
          if(palabra!=""){
          if(guardado){
            if(signo==0){
              res=res+toint(palabra);
            }
            else if(signo==1){
              res=res-toint(palabra);
            }
            else if(signo==2){
              res=res*toint(palabra);
            }
            else if(signo==3){
              if(toint(palabra)==0){
                inf=true;
              }
              else{
                inf=false;
              }
              res=res/toint(palabra);
            }
            else if(signo==6){
              res=toint(palabra);
            }
          }
          else{
            res=toint(palabra);
            guardado=true;
          }
          }
          palabra="";
          signo=3;
          
        }
        else if(numero==15){
            if(guardado){
            if(signo==0){
              res=res+toint(palabra);
            }
            else if(signo==1){
              res=res-toint(palabra);
            }
            else if(signo==2){
              res=res*toint(palabra);
            }
            else if(signo==3){
              if(toint(palabra)==0){
                inf=true;
              }
              else{
                inf=false;
              }
              res=res/toint(palabra);
            }
            
          }
          else{
            res=toint(palabra);
            
          }
          
          
          palabra="";
          signo=6;
          
          
        }
        else if(numero==14){
          limpia();
          res=0;
          palabra="";
          guardado=false;
          signo=9;
        }
        else{
          palabra=palabra+numero+"";
          
        }
          

    }
    
   //-----------------------------------------------------------------------------------------------
    anterior=numero;
    limpia();
    lcd.setCursor(0, 0);
    lcd.print(palabra);
    lcd.setCursor(15, 1);

    if(signo==0){
      lcd.print("+");
    }
    else if(signo==1){
      lcd.print("-");
    }
    else if(signo==2){
     lcd.print("*");
    }
    else if(signo==3){
      lcd.print("/");
    }
    else{
      lcd.print(" ");
      
    }
    lcd.setCursor(1, 1);
    lcd.print(res);
    if(inf){
      error();
    }
    
      delay(300);
      
  }
  
  
 
}

void error(){
  limpia();
  lcd.setCursor(0, 0);
    lcd.print("   Indefinido");
    lcd.setCursor(0, 1);
    lcd.print("XXXXXXXXXXXXXXXX");
    res=0;
    signo=9;
    guardado=false;
    inf=false;
    palabra="";
}
void limpia(){
    lcd.setCursor(0, 0);
    lcd.print("                ");
    lcd.setCursor(0, 1);
    lcd.print("                ");
    
  }
  
  
int toint(String a){
  int i=0;
  char s[a.length()];
  for(int x=0;x<a.length();x++){
      s[x]=a[x];
  }
  i=atoi(s);
  return i;
  
  
}
