module reportApp {
    requires javafx.controls;
    requires javafx.fxml;

    requires org.kordamp.bootstrapfx.core;
    requires com.google.gson;
    requires java.net.http;
    exports reportApp.Application;
    opens reportApp.Application to javafx.fxml;
}