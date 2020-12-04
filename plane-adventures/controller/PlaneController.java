/********************************************************
* Filename   : PlaneController.java
* Programmer : Iqdam Musayyad Rabbani
* Date       : 2018/05/23 
* Email      : iamusayyad@gmail.com
* Deskripsi  : package controller Plane untuk proses yang terkait dengan Plane (masukan keyboard)
*
*********************************************************/
package controller;

import javafx.stage.Stage;
import javafx.scene.Scene;
import javafx.scene.input.KeyEvent;
import javafx.event.EventHandler;

import view.HomeView;
import view.GameView;

public class PlaneController {

  GameView control;

  public PlaneController() {
    //Constructor
  }

  public PlaneController(GameView home) {
    GameView control = home;
  }

  public void onKeyPressed(GameView home) {
    //When key is pressed
    home.scene.setOnKeyPressed(new EventHandler<KeyEvent>(){
      @Override
      public void handle(KeyEvent event) {
          switch(event.getCode()) {
              case LEFT : home.goLeft = true; break;
              case RIGHT: home.goRight = true; break;
              case UP   : home.goUp = true; break;
              case DOWN : home.goDown = true; break;
              case SPACE: 
                  //Thread stops, go back to home view
                  home.running = false;
                  home.sky = new HomeView();
                  home.sky.start(home.stage);
                  break;
          }
      }
    });

  }

  public void onKeyReleased(GameView home) {
    //When key is released
    home.scene.setOnKeyReleased(new EventHandler<KeyEvent>() {
        @Override
        public void handle(KeyEvent event) {
            switch (event.getCode()) {
                case LEFT : home.goLeft = false; break;
                case RIGHT: home.goRight = false; break;
                case UP   : home.goUp = false; break;
                case DOWN : home.goDown = false; break;
            }
        }
    });
  }

}