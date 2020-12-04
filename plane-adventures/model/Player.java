/********************************************************
* Filename   : Player.java
* Programmer : Iqdam Musayyad Rabbani
* Date       : 2018/05/22 
* Email      : iamusayyad@gmail.com
* Deskripsi  : package model Player untuk mengakses tabel koleksi sekaligus objek Player
*
*********************************************************/
package model;

import javafx.beans.property.SimpleStringProperty;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;

public class Player extends DB {
  //Attributes
	private SimpleStringProperty username;
	private SimpleStringProperty jenisKoleksi;
  private SimpleStringProperty skorKoleksi;
  private SimpleStringProperty skorTotal;

  public Player() throws Exception {
    super();
    this.username = new SimpleStringProperty("");
    this.jenisKoleksi = new SimpleStringProperty("");
    this.skorKoleksi = new SimpleStringProperty("");
    this.skorTotal = new SimpleStringProperty("");
  }

  public Player(String username, String jenisKoleksi, String skorKoleksi, String skorTotal) throws Exception {
    this.username = new SimpleStringProperty(username);
    this.jenisKoleksi = new SimpleStringProperty(jenisKoleksi);
    this.skorKoleksi = new SimpleStringProperty(skorKoleksi);
    this.skorTotal = new SimpleStringProperty(skorTotal);
  }

  //Get set methods
  public String getUsername() {return username.get();}
  public void setUsername(String username) {this.username.set(username);}
  public SimpleStringProperty usernameProperty() {return username;}

  public String getJenisKoleksi() {return jenisKoleksi.get();}
  public void setJenisKoleksi(String jenisKoleksi) {this.jenisKoleksi.set(jenisKoleksi);}
  public SimpleStringProperty jenisKoleksiProperty() {return jenisKoleksi;}

  public String getSkorKoleksi() {return skorKoleksi.get();}
  public void setSkorKoleksi(String skorKoleksi) {this.skorKoleksi.set(skorKoleksi);}
  public SimpleStringProperty skorKoleksiProperty() {return skorKoleksi;}

  public String getSkorTotal() {return skorTotal.get();}
  public void setSkorTotal(String skorTotal) {this.skorTotal.set(skorTotal);}
  public SimpleStringProperty skorTotalProperty() {return skorTotal;}

  public void getAll(){
    //data retrieval logic
    try{
      String query = "SELECT * FROM tb_koleksi ORDER BY `skor total` DESC";
      createQuery(query);
    }
    catch(Exception e){
      System.out.println(e.toString());
    }
  }

  public void getByUsername(String username) {
    //data retrieval logic
    try{
      String query = "SELECT * FROM tb_koleksi WHERE username = '" + username + "'";
      createQuery(query);
    }
    catch(Exception e){
      System.out.println(e.toString());
    }
  }

  public void insertPlayer(String username) {
      // data entry logic
      try{
        String query = "INSERT INTO tb_koleksi(username, `jenis koleksi`, `skor koleksi`, `skor total`) values ('"+username+"', '', 0, 0)";
        createUpdate(query);
      }
      catch(Exception e){
        System.out.println(e.toString());
      }
  }

  public void updatePlayer(String username, String jenisKoleksi, String skorKoleksi, String skorTotal) {
    // data entry logic
      try{
        String query = "UPDATE tb_koleksi SET `jenis koleksi` = '"+jenisKoleksi+"', `skor koleksi` = "+skorKoleksi+", `skor total` = `skor total` + "+skorTotal+" WHERE username = '"+username+"';";
        createUpdate(query);
      }
      catch(Exception e){
        System.out.println(e.toString());
      }
  }
 

}
