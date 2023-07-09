package reportApp.Application;

import java.io.*;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.chart.BarChart;
import javafx.scene.chart.LineChart;
import javafx.scene.chart.PieChart;
import javafx.scene.chart.XYChart;
import javafx.scene.chart.StackedBarChart;
import com.google.gson.JsonElement;
import com.google.gson.JsonObject;
import com.google.gson.JsonParser;

public class ClientView {

    @FXML
    private LineChart<?, ?> SellsChart;

    @FXML
    private PieChart revenueChart;

    @FXML
    private BarChart<?, ?> subChart;

    @FXML
    private StackedBarChart<?, ?> userChart;

    private String[] months = {"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"};

    // Generate random data for the charts
    // For the sake of simplicity, the data is generated randomly
    // In a real application, the data would be retrieved from a database

    String filepath = "/     testData/data.json";


    @FXML
    void generate(ActionEvent event) {
        // Clear the charts
        SellsChart.getData().clear();
        revenueChart.getData().clear();
        subChart.getData().clear();
        userChart.getData().clear();
        // Read the data from the json file
        try(FileReader fileReader = new FileReader(filepath)){

            JsonElement jsonElement = JsonParser.parseReader(fileReader);
            JsonObject jsonObject = jsonElement.getAsJsonObject();
            JsonElement propertyValue = jsonObject.get("stats");

            XYChart.Series link = new XYChart.Series<>();
            XYChart.Series pub = new XYChart.Series<>();

            // Add data to the user chart
            for (JsonElement element : propertyValue.getAsJsonArray()) {
                JsonObject stats = element.getAsJsonObject();
                String month = stats.get("month").getAsString();
                int linkCount = stats.get("linkCount").getAsInt();
                int pubCount = stats.get("pubCount").getAsInt();
                link.setName("Liens");
                link.getData().add(new XYChart.Data(month, linkCount));
                pub.setName("Publicités");
                pub.getData().add(new XYChart.Data(month, pubCount));
            }
            userChart.getData().add(link);
            userChart.getData().add(pub);
        }catch (Exception e){
            e.printStackTrace();
        }


        // Add data to the revenue chart
        XYChart.Series or = new XYChart.Series<>();
        XYChart.Series argent = new XYChart.Series<>();
        XYChart.Series bronze = new XYChart.Series<>();
        for (int i = 6; i < months.length; i++) {
            or.setName("Or");
            or.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
            argent.setName("Argent");
            argent.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
            bronze.setName("Bronze");
            bronze.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
        }

        // Add data to the sells chart
        // Set legend names

        XYChart.Series sell = new XYChart.Series<>();
        sell.setName("Ventes");
        for (int i = 0; i < months.length; i++) {
            sell.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
        }
        SellsChart.getData().add(sell);


//        XYChart.Series sell = new XYChart.Series<>();
//        for (int i = 0; i < months.length; i++) {
//            sell.setName("Ventes");
//            sell.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
//        }

        // Add data to the revenue chart
        PieChart.Data premiumData = new PieChart.Data("Premium", (int)(Math.random()*100));
        PieChart.Data Sells = new PieChart.Data("Ventes", (int)(Math.random()*100));
        PieChart.Data pubData = new PieChart.Data("Publicité", (int)(Math.random()*100));

        // wait 1 second before adding the data to the charts
        try {
            Thread.sleep(500);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        subChart.getData().add(or);
        subChart.getData().add(argent);
        subChart.getData().add(bronze);
        revenueChart.getData().add(premiumData);
        revenueChart.getData().add(Sells);
        revenueChart.getData().add(pubData);
    }
}
