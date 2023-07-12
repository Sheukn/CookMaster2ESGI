module reportApp {
    requires javafx.controls;
    requires javafx.fxml;
    requires javafx.swing;

    requires org.kordamp.bootstrapfx.core;
    requires com.google.gson;
    requires java.net.http;
    requires java.desktop;
    requires pdfbox;
    exports reportApp.Application;
    opens reportApp.Application to javafx.fxml;
}