package reportApp.Application;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.chart.BarChart;
import javafx.scene.chart.LineChart;
import javafx.scene.chart.PieChart;
import javafx.scene.chart.XYChart;
import javafx.scene.chart.StackedBarChart;

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

    @FXML
    void generate(ActionEvent event) {
        // Clear the charts
        SellsChart.getData().clear();
        revenueChart.getData().clear();
        subChart.getData().clear();
        userChart.getData().clear();

        // Add data to the revenue chart
        XYChart.Series or = new XYChart.Series<>();
        XYChart.Series argent = new XYChart.Series<>();
        XYChart.Series bronze = new XYChart.Series<>();
        for (int i = 0; i < months.length; i++) {
            or.setName("Or");
            or.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
            argent.setName("Argent");
            argent.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
            bronze.setName("Bronze");
            bronze.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
        }

        // Add data to the views chart
        XYChart.Series link = new XYChart.Series<>();
        XYChart.Series pub = new XYChart.Series<>();
        for (int i = 0; i < months.length; i++) {
            link.setName("Lien direct");
            link.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
            pub.setName("Publicité");
            pub.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
        }

        // Add data to the sells chart
        XYChart.Series sell = new XYChart.Series<>();
        for (int i = 0; i < months.length; i++) {
            sell.setName("Ventes");
            sell.getData().add(new XYChart.Data(months[i], (int)(Math.random()*100)));
        }

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
        userChart.getData().add(link);
        userChart.getData().add(pub);
        SellsChart.getData().add(sell);
        revenueChart.getData().add(premiumData);
        revenueChart.getData().add(Sells);
        revenueChart.getData().add(pubData);
    }
}
