package reportApp.Application;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.shape.Rectangle;
import javafx.scene.text.Text;
import javafx.stage.Stage;

import java.io.IOException;
import com.google.gson.*;
import java.net.URI;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.net.http.HttpClient;

public class LoginController{

    @FXML
    private Text message;

    @FXML
    private TextField id;

    @FXML
    private Rectangle block;

    @FXML
    private PasswordField password;

    @FXML
    private Button submit;

    @FXML
    void login() throws IOException {
        // Retrieve the data from the text fields
        String id = this.id.getText();
        String password = this.password.getText();

        // Set the data in the singleton
        ApiKey apiKey = ApiKey.getInstance();

        // Make the API call
        String url = "http://localhost:8080/login";
        HttpClient client = HttpClient.newHttpClient();
        HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(url))
                .header("Content-Type", "application/json")
                .POST(HttpRequest.BodyPublishers.ofString("{\"email\":\"" + id + "\",\"password\":\"" + password + "\"}"))
                .build();
        try {
            HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());
            if (response.statusCode() == 200) {
                String responseBody = response.body();
                JsonElement jsonElement = JsonParser.parseString(responseBody);
                JsonObject jsonObject = jsonElement.getAsJsonObject();
                JsonElement propertyValue = jsonObject.get("token");
                apiKey.setApiKey(propertyValue.toString());

                ((Stage) submit.getScene().getWindow()).close();
                Parent root = FXMLLoader.load(getClass().getResource("main-view.fxml"));
                Stage stage = new Stage();
                stage.setTitle("Report Application" + " - " + "CookMaster" + " - " + "ESGI");
                stage.setScene(new Scene(root));
                stage.setResizable(false);
                stage.show();
            }
            else {
                message.setText("Mauvais identifiant ou mot de passe");
                // Change the color of the block
                block.setFill(javafx.scene.paint.Color.RED);
            }

        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        }
    }
}
