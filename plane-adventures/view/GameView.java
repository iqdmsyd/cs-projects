/********************************************************
* Filename   : GameView.java
* Programmer : Iqdam Musayyad Rabbani
* Date       : 2018/05/23 
* Email      : iamusayyad@gmail.com
* Deskripsi  : package view untuk menampilkan permainan
*
*********************************************************/
package view;

import javafx.application.Application;
import javafx.stage.Stage;
import javafx.scene.Group;
import javafx.scene.Scene;
import javafx.scene.canvas.Canvas;
import javafx.scene.canvas.GraphicsContext;
import javafx.scene.input.KeyEvent;
import javafx.scene.input.KeyCode;
import javafx.scene.media.Media;
import javafx.scene.media.MediaPlayer;
import javafx.scene.image.Image;
import javafx.scene.paint.Color;
import javafx.event.EventHandler;
import java.lang.Thread;
import java.lang.Runnable;
import java.util.ArrayList;
import java.util.Random;
import java.io.File;

import model.Player;
import model.Stone;
import controller.PlayerController;
import controller.PlaneController;

public class GameView extends Application {

    public Stage stage;
    public Scene scene;
    public Runnable runnable;
    public HomeView sky;
    public boolean running = true;
    public boolean goUp, goDown, goLeft, goRight; //Plane movement booleans
    private Thread thread;
    private Player hero;
    private ArrayList<Stone> stones = new ArrayList<Stone>(); //List of stones
    private ArrayList<Stone> basket = new ArrayList<Stone>(); //List of stones that obtained
    private double x, y; //Plane's coordinate
    private int i = 0; //Thread looping variable
    private int score = 0; //Player's score
    private double width, height; //Stage W and H

    public void setHero(Player hero) {
      //Set hero
      this.hero = hero;
    }

    public static void main(String[] args) {
        launch(args);
    }
 
    @Override
    public void start(Stage primaryStage) {
      stage = primaryStage;
      stage.setResizable(false);
      width = stage.getWidth();
      height = stage.getHeight();
      
      Group root = new Group();
      scene = new Scene(new Group());
      Canvas canvas = new Canvas(width, height);
      GraphicsContext gc = canvas.getGraphicsContext2D();
      root.getChildren().add(canvas);
      
      //Images..
      Image galaxy = new Image(getClass().getResourceAsStream("img/galaxy.png"));
      Image plane  = new Image(getClass().getResourceAsStream("img/plane.png"));
      Image iStone1 = new Image(getClass().getResourceAsStream("img/stone1.png"));
      Image iStone2 = new Image(getClass().getResourceAsStream("img/stone2.png"));
      Image iStone3 = new Image(getClass().getResourceAsStream("img/stone3.png"));
      Image iStone4 = new Image(getClass().getResourceAsStream("img/stone4.png"));
      Image iStone5 = new Image(getClass().getResourceAsStream("img/stone5.png"));
      Image iOver  = new Image(getClass().getResourceAsStream("img/gameover.png"));
      Image iBoom  = new Image(getClass().getResourceAsStream("img/explosion.png"));

      //Set plane's coordinate at the beginning of game
      x  = width/2 - 40;
      y  = height - 100;

      //Draw background and plane at the beginning of game
      drawBackground(gc, galaxy);
      drawPlane(gc, plane);

      ((Group) scene.getRoot()).getChildren().addAll(canvas);

      //Control the plane
      PlaneController control = new PlaneController();
      control.onKeyPressed(this);
      control.onKeyReleased(this);

      stage.setScene(scene);
      stage.show();

      //Runnable codes, the most important one
      runnable = new Runnable() {
        @Override
        public void run() {
          //While running is true
          while(running) {
              try{
                  clear(gc); //clear canvas
                  drawBackground(gc, galaxy); //draw bg

                  //Plane movement
                  if (goUp) y -= 3;
                  if (goDown) y += 3;
                  if (goLeft) x -= 3;
                  if (goRight) x += 3;

                  if (i%400 == 0) {
                      //Create soul stone
                      Stone stone = new Stone();
                      randomStone(stone);
                      stone.setName("Soul Stone");
                      stones.add(stone);
                  }
                  if (i%300 == 0) {
                      //Create mind stone
                      Stone stone = new Stone();
                      randomStone(stone);
                      stone.setName("Mind Stone");
                      stones.add(stone);
                  }
                  if (i%200 == 0) {
                      //Create time stone
                      Stone stone = new Stone();
                      randomStone(stone);
                      stone.setName("Time Stone");
                      stones.add(stone);
                  }
                  if (i%100 == 0) {
                      //Create power stone
                      Stone stone = new Stone();
                      randomStone(stone);
                      stone.setName("Power Stone");
                      stones.add(stone);
                  }
                  if (i%50 == 0) {
                      //Create thanos's stone :D
                      Stone stone = new Stone();
                      randomStone(stone);
                      stone.setName("Zonk");
                      stones.add(stone);
                  }

                  for (Stone stone : stones) {
                      //Draw stone based on its name
                      if (stone.getName() == "Soul Stone") {
                          drawStone(gc, iStone1, stone.getX(), stone.getY());
                      }else if (stone.getName() == "Mind Stone") {
                          drawStone(gc, iStone2, stone.getX(), stone.getY());
                      }else if (stone.getName() == "Time Stone") {
                          drawStone(gc, iStone3, stone.getX(), stone.getY());
                      }else if (stone.getName() == "Power Stone") {
                          drawStone(gc, iStone4, stone.getX(), stone.getY());
                      }else if (stone.getName() == "Zonk") {
                          drawStone(gc, iStone5, stone.getX(), stone.getY());
                      }

                      //Move stone
                      stone.setX(stone.getX() + stone.getXSpeed());
                      stone.setY(stone.getY() + stone.getYSpeed());

                      //Plane hit stone
                      if ((x <= stone.getX()+20 && x > stone.getX()-20) && (y <= stone.getY()+30 && y > stone.getY()-50)) {
                          //Add to basket, list of stones that is obtained
                          basket.add(stone);
                          score += stone.getPoint(); //Add the score
                          String audio = "audio/point.mp3";

                          //If the plane hit thanos's stone
                          if (stone.getPoint() == 0) {
                              running = false; //Thread stops
                              audio = "audio/explosion.mp3";
                              //Find max stone in the basket
                              int max = basket.get(0).getPoint();
                              String jenisStone = basket.get(0).getName();
                              for (Stone temp : basket) {
                                  if (temp.getPoint() > max) {
                                      max = temp.getPoint();
                                      jenisStone = temp.getName();
                                   } 
                              }

                              PlayerController home = new PlayerController();
                              //Update player's data
                              try{
                                if (max > Integer.valueOf(hero.getSkorKoleksi())) {
                                    //If player get bigger stone type than before
                                    home.updatePlayer(hero.getUsername(), jenisStone, String.valueOf(max), String.valueOf(score));    
                                }else {
                                    home.updatePlayer(hero.getUsername(), hero.getJenisKoleksi(), String.valueOf(hero.getSkorKoleksi()), String.valueOf(score));
                                }
                              }catch(Exception e){
                                e.printStackTrace();
                              }

                          }

                          Media player = new Media(new File(audio).toURI().toString());
                          MediaPlayer mPlayer = new MediaPlayer(player);
                          mPlayer.setVolume(30);
                          mPlayer.play();
                          stone.setX(800); //Throw stone
                      }
                  }

                  drawPlane(gc, plane); //Draw plane
                  drawScore(gc); //Draw score
                  if (!running) {
                      gameOver(gc, iOver, iBoom); //If thread stops, draw game over
                  }

              }catch(Exception ee) {
                  ee.printStackTrace();
              }

              try{
                  Thread.sleep(1000/80);
              }catch(InterruptedException ee) {
                  ee.printStackTrace();
              }
              i++;
          }
        }
      };

      //Start thread
      try{
        thread = new Thread(runnable);
        thread.start();  
      }catch(Exception e) {
        e.printStackTrace();
      }
    }

    private void randomStone(Stone stone) {
      //Random stone's coordinate and speed  
      Random r = new Random();
      int dir = r.nextInt(4) + 1; //direction : 1, 2 => Horizontal; 3, 4 => Vertical
      int x = r.nextInt(531) + 1; //x location
      int y = r.nextInt(770) + 1; //y location
      int v = r.nextInt(5) + 1; //speed
      if (dir == 1) {
        //stone will moves horizontally from left to right
        stone.setX(0);
        stone.setY(y);
        stone.setXSpeed(v);
        stone.setYSpeed(0);
      }else if (dir == 2) {
        //stone will moves horizontally from right to left
        stone.setX(765);
        stone.setY(y);
        stone.setXSpeed(-1 * v);
        stone.setYSpeed(0);
      }else if (dir == 3) {
        //stone will moves vertically from top to bottom
        stone.setX(x);
        stone.setY(0);
        stone.setXSpeed(0);
        stone.setYSpeed(v);
      }else if (dir == 4) {
        //stone will moves vertically from bottom to top
        stone.setX(x);
        stone.setY(500);
        stone.setXSpeed(0);
        stone.setYSpeed(-1 * v);
      }
    }

    private void clear(GraphicsContext gc) {
      //Clear canvas  
      gc.clearRect(x, y, 50, 50);
      for (Stone stone : stones) {
          if (stone.getX() <= width && stone.getY() <= height) {
              gc.clearRect(stone.getX(), stone.getY(), 40, 30);
          }
      }
    }

    private void drawBackground(GraphicsContext gc, Image img) {
      //Draw background  
      gc.drawImage(img, 0, 0, width, height);
    }

    private void drawPlane(GraphicsContext gc, Image img) {
      //Draw plane  
      gc.drawImage(img, this.x, this.y, 80, 80);
    }

    private void drawStone(GraphicsContext gc, Image img, int x, int y) {
      //Draw stone  
      if (x <= width && y <= height) {
          gc.drawImage(img, x, y, 40, 30);
      }
    }

    private void drawScore(GraphicsContext gc) {
      //Draw score and player's username  
      gc.setFill(Color.WHITE);
      gc.fillText("Username : " + hero.getUsername(), 10, 20, 150);
      gc.fillText("Skor     : " + score, 10, 40, 150);
    }

    private void gameOver(GraphicsContext gc, Image img, Image img2) {
      //Draw game over image
      gc.drawImage(img2, this.x, this.y, 50, 50);
      gc.drawImage(img, width/2-150, height/2-150, 250, 250);
    }


}