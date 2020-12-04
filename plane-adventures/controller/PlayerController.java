/********************************************************
* Filename   : PlayerController.java
* Programmer : Iqdam Musayyad Rabbani
* Date       : 2018/05/22 
* Email      : iamusayyad@gmail.com
* Deskripsi  : package controller Player untuk proses yang terkait dengan Player
*
*********************************************************/
package controller;

import java.io.*;
import java.util.ArrayList;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;

import model.Player;

public class PlayerController {

  //List of player
  ObservableList<Player> players = FXCollections.observableArrayList();
  String error;

  public PlayerController() {
    //Constructor
  }

  public ObservableList<Player> getAllPlayers() {
    try{
      Player player = new Player();
      player.getAll(); //retrieve all player

      while(player.getResult().next()){
          players.add(new Player(
            player.getResult().getString(2),
            player.getResult().getString(3),
            player.getResult().getString(4),
            player.getResult().getString(5)
          ));
      }

      player.closeResult();
      player.closeConnection();

    }catch(Exception e) {
      error = e.toString();
    }

    return players;
  }

  public void addPlayer(String username) {
    //insert new player to database
    try{
      Player player = new Player();
      player.insertPlayer(username);
      player.closeResult();
      player.closeConnection();
    }catch(Exception e) {
      error = e.toString();
    }
  }

  public Player getByUsername(String username) {
    //Get player by its username
    try{
      Player player = new Player();
      player.getByUsername(username);

      while(player.getResult().next()){
          player.setUsername(player.getResult().getString(2));
          player.setJenisKoleksi(player.getResult().getString(3));
          player.setSkorKoleksi(player.getResult().getString(4));
          player.setSkorTotal(player.getResult().getString(5));
      }

      player.closeResult();
      player.closeConnection();
      return player;
    }catch(Exception e) {
      error = e.toString();
      return null;
    } 
  }

  public void updatePlayer(String username, String jenisKoleksi, String skorKoleksi, String skorTotal) {
    //Update player data including jenisKoleksi, skorKoleksi and skorTotal
    try{
      Player player = new Player();
      player.updatePlayer(username, jenisKoleksi, skorKoleksi, skorTotal);
      player.closeResult();
      player.closeConnection();
    }catch(Exception e){
      error = e.toString();
    }
  }

  public String getError() {
    return this.error;
  }

}