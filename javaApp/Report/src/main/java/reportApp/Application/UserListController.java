package reportApp.Application;

import com.google.gson.*;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;

import java.net.URI;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.net.http.HttpClient;
import java.io.IOException;

import java.util.ArrayList;

public class UserListController {


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
    private TableView<Users> userList;

    // Generate random user with random subscription type (Gold, Silver, Bronze) and random id (1-100) and random name and surname and random mail

    private ObservableList<Users> userData;
    private ArrayList<Users> userListArray = new ArrayList<>();

    @FXML
    void generate() {
            String url = "https://spatuledoree.fr/api/users";
            HttpClient client = HttpClient.newHttpClient();
            HttpRequest request = HttpRequest.newBuilder()
                    .uri(URI.create(url))
                    .method("GET", HttpRequest.BodyPublishers.noBody())
                    .build();
            try {
                // Make the API call and get the response
                HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());

                // Check if the response was successful
                if (response.statusCode() == 200) {
                    // Get the response body as a string
                    String responseBody = response.body();

                    //        try(FileReader file = new FileReader(filepath)){
                    JsonElement jsonElement = JsonParser.parseString(responseBody);
                    JsonObject jsonObject = jsonElement.getAsJsonObject();
                    JsonElement propertyValue = jsonObject.get("data");

                    for(JsonElement element : propertyValue.getAsJsonArray()){
                        JsonObject user = element.getAsJsonObject();
                        String name = user.get("name").getAsString();
                        String email = user.get("email").getAsString();
//                        Users newUser = new Users(id, email, firstname, name, subscription);
//                        userListArray.add(newUser);
                    }
//                    userData = FXCollections.observableArrayList(userListArray);
//                    idCol.setCellValueFactory(new PropertyValueFactory<>("id"));
//                    mailCol.setCellValueFactory(new PropertyValueFactory<>("email"));
//                    nomCol.setCellValueFactory(new PropertyValueFactory<>("firstname"));
//                    prenomCol.setCellValueFactory(new PropertyValueFactory<>("name"));
//                    subCol.setCellValueFactory(new PropertyValueFactory<>("sub"));
//                    userList.setItems(userData);

                } else {
                    // Handle the error response
                    System.out.println("Error: " + response.statusCode() + " " + response.body());
                }
            } catch (IOException e) {
                // Handle IO exception
                e.printStackTrace();
            } catch (InterruptedException e) {
                // Handle interrupted exception
                e.printStackTrace();
            }
        }
}


