package reportApp.Application;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;

public class userListController {


    @FXML
    private TableColumn<?, ?> idCol;
    @FXML
    private TableColumn<?, ?> mailCol;
    @FXML
    private TableColumn<?, ?> nomCol;
    @FXML
    private TableColumn<?, ?> prenomCol;
    @FXML
    private TableColumn<?, ?> subCol;
    @FXML
    private TableView<User> userList;

    // Generate random user with random subscription type (Gold, Silver, Bronze) and random id (1-100) and random name and surname and random mail
    private final ObservableList<User> data = FXCollections.observableArrayList(
            new User((int)(Math.random()*100), ""+(int)(Math.random()*100)+"@gmail.com", "John", "Doe", "Gold"),
            new User((int)(Math.random()*100), ""+(int)(Math.random()*100)+"@gmail.com", "Jane", "Doe", "Silver"),
            new User((int)(Math.random()*100), ""+(int)(Math.random()*100)+"@gmail.com", "John", "Smith", "Bronze"),
            new User((int)(Math.random()*100), ""+(int)(Math.random()*100)+"@gmail.com", "Jane", "Smith", "Gold"),
            new User((int)(Math.random()*100), ""+(int)(Math.random()*100)+"@gmail.com", "John", "Doe", "Silver"),
            new User((int)(Math.random()*100), ""+(int)(Math.random()*100)+"@gmail.com", "Jane", "Doe", "Bronze")
            );

    // Add the data to the different columns
    @FXML
    void initialize() {
       idCol.setCellValueFactory(new PropertyValueFactory<>("id"));
       mailCol.setCellValueFactory(new PropertyValueFactory<>("mail"));
       nomCol.setCellValueFactory(new PropertyValueFactory<>("nom"));
       prenomCol.setCellValueFactory(new PropertyValueFactory<>("prenom"));
       subCol.setCellValueFactory(new PropertyValueFactory<>("sub"));
       userList.setItems(data);
    }


}
