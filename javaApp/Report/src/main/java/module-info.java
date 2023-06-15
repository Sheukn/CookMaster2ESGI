module reportApp {
    requires javafx.controls;
    requires javafx.fxml;

    requires org.kordamp.bootstrapfx.core;
    exports reportApp.Application;
    opens reportApp.Application to javafx.fxml;
}