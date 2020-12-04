/********************************************************
* Filename   : HomeView.java
* Programmer : Iqdam Musayyad Rabbani
* Date       : 2018/05/22 
* Email      : iamusayyad@gmail.com
* Deskripsi  : package view untuk menampilkan menu awal
*
*********************************************************/
package view;

import javafx.application.Application;
import javafx.scene.Group;
import javafx.scene.Scene;
import javafx.scene.layout.VBox;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Background;
import javafx.scene.layout.BackgroundImage;
import javafx.scene.layout.BackgroundRepeat;
import javafx.scene.layout.BackgroundPosition;
import javafx.scene.layout.BackgroundSize;
import javafx.scene.control.TableView;
import javafx.scene.control.TableColumn;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.control.Button;
import javafx.scene.media.Media;
import javafx.scene.media.MediaPlayer;
import javafx.scene.image.Image;
import javafx.beans.value.ObservableValue;
import javafx.beans.value.ChangeListener;
import javafx.beans.property.SimpleStringProperty;
import javafx.collections.ObservableList;
import javafx.collections.FXCollections;
import javafx.event.EventHandler;
import javafx.event.ActionEvent;
import javafx.stage.Stage;
import javafx.geometry.Insets;
import java.io.File;

import model.Player;
import controller.PlayerController;

public class HomeView {
  
  ObservableList<Player> players = FXCollections.observableArrayList(); //List of players
  private TableView<Player> table = new TableView<Player>();
  private final BackgroundImage myBI = new BackgroundImage(new Image(getClass().getResourceAsStream("img/galaxy.png")), BackgroundRepeat.REPEAT, BackgroundRepeat.REPEAT, BackgroundPosition.DEFAULT, BackgroundSize.DEFAULT);
  private String hero; //Player's username

  public HomeView() {
    //Constructor
  }

  public void refreshData(PlayerController home) {
    //Refresh list and table's items
    players.clear();
    table.getItems().clear();

    try{
      players = home.getAllPlayers(); //Get all players
    }catch(Exception e) {
      System.out.println(home.getError());
    }

    table.setItems(players); //Set table's items
  }

  public void start(Stage stage) {

    stage.setTitle("PLANE ADVENTURES");
    stage.setWidth(765);
    stage.setHeight(500);
    stage.setResizable(false);
    table.setMaxWidth(650);
    table.setPrefWidth(650);
    table.setPrefHeight(200);
    table.setMaxHeight(200);

    PlayerController home = new PlayerController();
    Group root = new Group();
    Scene scene = new Scene(root);
    Media player = new Media(new File("audio/intro.mp3").toURI().toString());
    MediaPlayer mPlayer = new MediaPlayer(player);
    mPlayer.setVolume(30);
    mPlayer.play();

    final String IDLE = "-fx-font-size: 15pt; -fx-background-color: transparent; -fx-text-fill: #0280D3; -fx-border-color: #0280D3; -fx-font-family: Sifonn Pro Bold";
    final String HOVERED = "-fx-font-size: 15pt; -fx-background-color: #0280D3; -fx-text-fill: #FFFFFF; -fx-border-color: #0280D3; -fx-font-family: Sifonn Pro Bold";

    final Label label1 = new Label("PLANE ADVENTURES");
    label1.setStyle("-fx-font-size: 25; -fx-font-family: Sifonn Pro Bold; -fx-text-fill: #FFFFFF;");
    
    final Label label2 = new Label("Username");
    label2.setStyle("-fx-font-size: 15pt; -fx-font-family: Sifonn Pro; -fx-text-fill: #FFFFFF;");
    
    TextField tfUsername = new TextField();
    
    Button btMain = new Button("Main");
    btMain.setPrefWidth(200);
    btMain.setStyle(IDLE);
    btMain.setOnMouseEntered(e -> btMain.setStyle(HOVERED));
    btMain.setOnMouseExited(e -> btMain.setStyle(IDLE));
    btMain.setOnAction(new EventHandler<ActionEvent>(){
      @Override
      public void handle(ActionEvent e) {

        hero = tfUsername.getText(); //Player's username
        Player play = home.getByUsername(hero); //Get player object
        if (!play.getUsername().equals(hero)) {
          //If hero is a new player, add to database
          home.addPlayer(hero);
          play = home.getByUsername(hero); //Get player object
          refreshData(home);
        }
      
        mPlayer.stop();
        //Go to game view
        GameView game = new GameView();
        game.setHero(play); //Set hero that playing
        game.start(stage);

      }
    });

    Button btKeluar = new Button("Keluar");
    btKeluar.setPrefWidth(200);
    btKeluar.setStyle(IDLE);
    btKeluar.setOnMouseEntered(e -> btKeluar.setStyle(HOVERED));
    btKeluar.setOnMouseExited(e -> btKeluar.setStyle(IDLE));
    btKeluar.setOnAction(new EventHandler<ActionEvent>(){
      @Override
      public void handle(ActionEvent e) {
        System.exit(0);
      }
    });

    //Table
    TableColumn UsernameCol = new TableColumn("Username");
    UsernameCol.setPrefWidth(215);
    UsernameCol.setCellValueFactory(new PropertyValueFactory<Player, String>("username"));

    TableColumn JenisKoleksiCol = new TableColumn("Jenis Koleksi");
    JenisKoleksiCol.setPrefWidth(215);
    JenisKoleksiCol.setCellValueFactory(new PropertyValueFactory<Player, String>("jenisKoleksi"));

    TableColumn SkorKoleksiCol = new TableColumn("Skor Koleksi");
    SkorKoleksiCol.setPrefWidth(100);
    SkorKoleksiCol.setCellValueFactory(new PropertyValueFactory<Player, String>("skorKoleksi"));

    TableColumn SkorTotalCol = new TableColumn("Skor Total");
    SkorTotalCol.setPrefWidth(100);
    SkorTotalCol.setCellValueFactory(new PropertyValueFactory<Player, String>("skorTotal"));

    // On table selected row changed
    table.getSelectionModel().selectedItemProperty().addListener(new ChangeListener() {
      @Override
      public void changed(ObservableValue observableValue, Object oldValue, Object newValue) {
          //Check whether item is selected and set value of selected item to Label
          if(table.getSelectionModel().getSelectedItem() != null) 
          {    
            Player select = table.getSelectionModel().getSelectedItem();
            tfUsername.setText(select.getUsername());
            hero = tfUsername.getText();
          }
      }
    });

    table.getColumns().addAll(UsernameCol, JenisKoleksiCol, SkorKoleksiCol, SkorTotalCol);
    refreshData(home);

    HBox hb1 = new HBox();
    HBox hb2 = new HBox();
    hb1.getChildren().addAll(label2, tfUsername);
    hb1.setSpacing(20);
    hb2.getChildren().addAll(btMain, btKeluar);
    hb2.setSpacing(50);

    final VBox vbox = new VBox();
    vbox.setBackground(new Background(myBI));
    vbox.setSpacing(20);
    vbox.getChildren().addAll(label1, hb1, table, hb2);
    vbox.setPadding(new Insets(25, 50, 100, 50));

    ((Group) scene.getRoot()).getChildren().addAll(vbox);
    stage.setScene(scene);
    stage.show();

  }

}