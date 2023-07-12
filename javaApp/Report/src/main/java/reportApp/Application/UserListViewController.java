package reportApp.Application;

import com.google.gson.*;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;

import java.io.Reader;
import java.net.URI;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.net.http.HttpClient;
import java.io.IOException;

import java.io.File;
import java.io.FileReader;
import java.net.http.HttpTimeoutException;
import java.util.ArrayList;

public class userListViewController {


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

    // Generate random user with random subscription type (Gold, Silver, Bronze) and random id (1-100) and random name and surname and random mail

    private ObservableList<User> userData;
    private ArrayList<User> userListArray = new ArrayList<>();
    private ArrayList<String> pokemonType = new ArrayList<>();
    //Add data to data


    // Add the data to the different columns
    @FXML
    void generate() {
        for(int i = 1; i <= 200; i++){
            String url = "https://pokeapi.co/api/v2/pokemon/" + i;
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

                    // Use Gson to parse the response body to a JsonElement
                    JsonElement jsonElement = JsonParser.parseString(responseBody);

                    // Now you can work with the JsonElement
                    // For example, you can access its properties using jsonElement.get("propertyName")
                    JsonObject jsonObject = jsonElement.getAsJsonObject();
                    JsonElement responseId = jsonObject.get("id");
                    JsonElement responseName = jsonObject.get("name");

                    JsonArray typeArray = JsonParser.parseString(String.valueOf(jsonObject.get("types"))).getAsJsonArray();


                    pokemonType.clear();
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
        idCol.setCellValueFactory(new PropertyValueFactory<>("id"));
        nomCol.setCellValueFactory(new PropertyValueFactory<>("name"));
        prenomCol.setCellValueFactory(new PropertyValueFactory<>("first_type"));
        mailCol.setCellValueFactory(new PropertyValueFactory<>("second_type"));

//        try(FileReader file = new FileReader(filepath)){
//            JsonElement jsonElement = JsonParser.parseReader(file);
//            JsonObject jsonObject = jsonElement.getAsJsonObject();
//            JsonElement propertyValue = jsonObject.get("User");
//
//            for(JsonElement element : propertyValue.getAsJsonArray()){
//                JsonObject user = element.getAsJsonObject();
//                int id = user.get("id").getAsInt();
//                String name = user.get("name").getAsString();
//                String firstname = user.get("firstname").getAsString();
//                String email = user.get("email").getAsString();
//                String subscription = user.get("subscription").getAsString();
//
//                User newUser = new User(id, email, firstname, name, subscription);
//                userListArray.add(newUser);
//            }
//            userData = FXCollections.observableArrayList(userListArray);
//        }catch (Exception e){
//            e.printStackTrace();
//        }
//        idCol.setCellValueFactory(new PropertyValueFactory<>("id"));
//        mailCol.setCellValueFactory(new PropertyValueFactory<>("email"));
//        nomCol.setCellValueFactory(new PropertyValueFactory<>("firstname"));
//        prenomCol.setCellValueFactory(new PropertyValueFactory<>("name"));
//        subCol.setCellValueFactory(new PropertyValueFactory<>("sub"));
//        userList.setItems(userData);
    }


}
