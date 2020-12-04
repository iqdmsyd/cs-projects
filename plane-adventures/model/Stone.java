/********************************************************
* Filename   : Stone.java
* Programmer : Iqdam Musayyad Rabbani
* Date       : 2018/05/23
* Email      : iamusayyad@gmail.com
* Deskripsi  : package model Stone untuk memodelkan objek Stone
*
*********************************************************/
package model;

public class Stone {
  //Attributes
  int x, y;
  int xSpeed, ySpeed;
  int point;
  String name;
  String soul = "Soul Stone";
  String mind = "Mind Stone";
  String time = "Time Stone";
  String power = "Power Stone";

  public Stone() {
    //Constructor
  }

  public Stone(int x, int y, int xspeed, int yspeed, String name) {
    this.x = x;
    this.y = y;
    this.xSpeed = xspeed;
    this.ySpeed = yspeed;
    this.name = name;
    if (this.name == soul) {this.point = 50;}
    else if (this.name == mind) {this.point = 25;}
    else if (this.name == time) {this.point = 10;}
    else if (this.name == power) {this.point = 5;}
    else {this.point = 0;}
  }

  //Get-set methods
  public void setX(int x) {this.x = x;}
  public int getX() {return this.x;}

  public void setY(int y) {this.y = y;}
  public int getY() {return this.y;}

  public void setXSpeed(int xSpeed) {this.xSpeed = xSpeed;}
  public int getXSpeed() {return this.xSpeed;}

  public void setYSpeed(int ySpeed) {this.ySpeed = ySpeed;}
  public int getYSpeed() {return this.ySpeed;}

  public void setName(String name) {
    this.name = name;
    //Set stone's point based on its name
    if (this.name == soul) {this.point = 50;}
    else if (this.name == mind) {this.point = 25;}
    else if (this.name == time) {this.point = 10;}
    else if (this.name == power) {this.point = 5;}
    else {this.point = 0;}
  }
  public String getName() {return this.name;}

  public void setPoint(int point) {this.point = point;}
  public int getPoint() {return this.point;}


}