import javafx.application.Application;
import javafx.stage.Stage;
import view.HomeView;

public class Main extends Application{

  @Override
  public void start(Stage stage) throws Exception {
    HomeView home = new HomeView();
    home.start(stage);
  }

  public static void main(String[] args) {
    launch(args);
  }
}