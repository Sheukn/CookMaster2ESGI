package reportApp.Application;

import com.google.gson.*;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.concurrent.Task;
import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;

import java.net.URI;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.net.http.HttpClient;
import java.io.IOException;

import java.time.Instant;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.Date;

public class UserListViewController {


    String token = Token.getInstance().getToken();

    @FXML
    private TableView<User> userList;
    @FXML
    private TableColumn<User, Integer> idCol;
    @FXML
    private TableColumn<User, String> mailCol;
    @FXML
    private TableColumn<User, String> nomCol;
    @FXML
    private TableColumn<User, String> prenomCol;
    @FXML
    private TableColumn<User, String> subCol;
    @FXML
    private TableColumn<User, Date> dateCol;
    private ObservableList<User> userData;

    @FXML
    void generate() {

        // Clear the table
        userList.getItems().clear();

        Task<HttpResponse<String>> task = new Task<>() {
            @Override
            protected HttpResponse<String> call() throws Exception {
                String url = "https://spatuledoree.fr/api/users";
                HttpClient client = HttpClient.newHttpClient();
                HttpRequest request = HttpRequest.newBuilder()
                        .uri(URI.create(url))
                        .header("Content-Type", "application/json")
                        .header("Authorization", "Bearer " + token)
                        .method("GET", HttpRequest.BodyPublishers.noBody())
                        .build();

                return client.send(request, HttpResponse.BodyHandlers.ofString());
            }
        };
        task.setOnSucceeded(event -> {
            HttpResponse<String> response = task.getValue();
            JsonElement jsonElement = JsonParser.parseString(response.body());
            JsonObject jsonObject = jsonElement.getAsJsonObject();
            JsonArray jsonArray = jsonObject.getAsJsonArray("data");

            String[] subscriptions = { "Gold", "Silver", "Bronze"};
            userData = FXCollections.observableArrayList();

            for (int i = 0; i < jsonArray.size(); i++) {
                JsonObject user = jsonArray.get(i).getAsJsonObject();
                int id = user.get("id").getAsInt();
                String email = user.get("email").getAsString();
                String name = user.get("name").getAsString();
                String firstName = user.get("firstname").getAsString();

                int random = (int) (Math.random() * 3);
                String subscription = subscriptions[random];

                String dateString = user.get("created_at").getAsString();
                DateTimeFormatter formatter = DateTimeFormatter.ISO_INSTANT;
                Instant instant = Instant.from(formatter.parse(dateString));
                Date createdAt = Date.from(instant);

                userData.add(new User(id, email, name, firstName, subscription, createdAt));
            }

            idCol.setCellValueFactory(new PropertyValueFactory<>("id"));
            mailCol.setCellValueFactory(new PropertyValueFactory<>("email"));
            nomCol.setCellValueFactory(new PropertyValueFactory<>("name"));
            prenomCol.setCellValueFactory(new PropertyValueFactory<>("firstname"));
            subCol.setCellValueFactory(new PropertyValueFactory<>("subscription"));
            dateCol.setCellValueFactory(new PropertyValueFactory<>("date"));

            userList.setItems(userData);
        });
        task.setOnFailed(event -> {
            Throwable exception = task.getException();
            exception.printStackTrace();
        });
        // Start the task in a new background thread
        Thread thread = new Thread(task);
        thread.start();
    }

}
