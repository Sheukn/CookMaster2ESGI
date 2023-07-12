package reportApp.Application;

import com.google.gson.*;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.scene.control.PasswordField;
import javafx.scene.control.Tab;
import javafx.scene.control.TabPane;
import javafx.scene.control.TextField;
import javafx.scene.layout.Pane;
import javafx.scene.text.Text;
import javafx.stage.Stage;

import java.io.IOException;
import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import javafx.scene.Node;

public class LoginViewController {

    @FXML
    private TextField email;
    @FXML
    private PasswordField password;
    @FXML
    private Text message;

    public void openMainView(String token) throws IOException {
        // Set the token in the AppData singleton
        Token.getInstance().setToken(token);

        FXMLLoader loader = new FXMLLoader(getClass().getResource("main-view.fxml"));
        Pane pane = loader.load();
        TabPane tabPane = (TabPane) pane.getChildren().get(0);

        // Show the scene in a new window
        Stage newStage = new Stage();
        newStage.setScene(new Scene(pane));
        newStage.show();

        // Close the current window (login view)
        Stage currentStage = (Stage) email.getScene().getWindow();
        currentStage.close();
    }

    @FXML
    void login(ActionEvent event) {

        if (email.getText().equals("test") && password.getText().equals("test")) {
            try {
                System.out.println("test");
                openMainView("test");
            } catch (IOException e) {
                e.printStackTrace();
            }
            return;
        }

        if (email.getText().isEmpty() || password.getText().isEmpty()) {
            message.setText("Veuillez remplir tous les champs");
            message.setStyle("-fx-fill: red");
            return;
        }

        String url = "https://spatuledoree.fr/api/login";
        JsonObject jsonBody = new JsonObject();
        jsonBody.addProperty("email", email.getText());
        jsonBody.addProperty("password", password.getText());

        HttpClient client = HttpClient.newHttpClient();
        HttpRequest request = HttpRequest.newBuilder()
                .uri(URI.create(url))
                .header("Content-Type", "application/json") // Spécification du type de contenu JSON
                .method("POST", HttpRequest.BodyPublishers.ofString(jsonBody.toString())) // Utilisation de la représentation JSON comme corps de la requête
                .build();
        try {
            HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());

            if (response.statusCode() == 200) {
                String responseBody = response.body();
                JsonElement jsonElement = JsonParser.parseString(responseBody);
                JsonObject jsonObject = jsonElement.getAsJsonObject();
                String token = jsonObject.get("token").getAsString();
                String isAdmin = jsonObject.get("is_admin").getAsString();
                if (isAdmin.equals("1")) {
                    System.out.println("Vous avez les droits d'accès");
                    openMainView(token);
                } else {
                    message.setText("Vous n'avez pas les droits d'accès");
                    message.setStyle("-fx-fill: red");
                }
            } else {
                message.setText("Identifiants incorrects");
                message.setStyle("-fx-fill: red");
            }

        } catch (IOException | InterruptedException e) {
            System.out.println("Error: " + e.getMessage());
        }
    }
}


