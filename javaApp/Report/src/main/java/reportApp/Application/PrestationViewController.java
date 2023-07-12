package reportApp.Application;

import java.awt.image.BufferedImage;
import java.io.*;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.SnapshotParameters;
import javafx.scene.chart.BarChart;
import javafx.scene.chart.LineChart;
import javafx.scene.chart.PieChart;
import javafx.scene.chart.XYChart;
import javafx.scene.chart.StackedBarChart;
import javax.imageio.ImageIO;
import java.io.File;
import java.io.IOException;
import javafx.embed.swing.SwingFXUtils;
import javafx.scene.image.Image;
import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.pdmodel.PDPage;
import org.apache.pdfbox.pdmodel.PDPageContentStream;
import org.apache.pdfbox.pdmodel.PDPageContentStream.AppendMode;
import org.apache.pdfbox.pdmodel.common.PDRectangle;
import org.apache.pdfbox.pdmodel.graphics.image.PDImageXObject;
import java.io.IOException;


public class PrestationViewController {
    String token = Token.getInstance().getToken();

    @FXML
    private BarChart<?, ?> coursesCount;

    @FXML
    private LineChart<?, ?> eventCount;

    @FXML
    private PieChart foodType;

    @FXML
    private StackedBarChart<?, ?> tastingCount;

    private String[] months = {"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"};

    // Generate random data for the charts
    // For the sake of simplicity, the data is generated randomly
    // In a real application, the data would be retrieved from a database
    String filepath = "./data.json";
    @FXML
    void generate(ActionEvent event) {
        // Clear the charts
        eventCount.getData().clear();
        foodType.getData().clear();
        coursesCount.getData().clear();
        tastingCount.getData().clear();
        // Read the data from the json file

        XYChart.Series link = new XYChart.Series<>();
        XYChart.Series pub = new XYChart.Series<>();
        link.setName("Liens");
        pub.setName("Publicités");
        for (int i = 0; i< months.length; i++) {
            int linkCount = (int) (Math.random() * 100);
            int pubCount = (int) (Math.random() * 100);
            link.getData().add(new XYChart.Data(months[i], linkCount));
            pub.getData().add(new XYChart.Data(months[i], pubCount));
        }

        tastingCount.getData().add(link);
        tastingCount.getData().add(pub);

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
        eventCount.getData().add(sell);

        // Add data to the revenue chart
        PieChart.Data entrees = new PieChart.Data("Entrées", (int)(Math.random()*100));
        PieChart.Data plats = new PieChart.Data("Plats", (int)(Math.random()*100));
        PieChart.Data desserts = new PieChart.Data("Desserts", (int)(Math.random()*100));

        // wait 1 second before adding the data to the charts
        try {
            Thread.sleep(500);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        coursesCount.getData().add(or);
        coursesCount.getData().add(argent);
        coursesCount.getData().add(bronze);
        foodType.getData().add(entrees);
        foodType.getData().add(plats);
        foodType.getData().add(desserts);
    }

    @FXML
    void generatePDF(ActionEvent event) {
        try {
            PDDocument document = new PDDocument();
            PDPage page = new PDPage(PDRectangle.A4);
            document.addPage(page);

            PDPageContentStream contentStream = new PDPageContentStream(document, page);

            // Generate the LineChart image
            File lineChartFile = new File("line_chart.png");
            generateLineChartImage(lineChartFile);

            // Generate the PieChart image
            File pieChartFile = new File("pie_chart.png");
            generatePieChartImage(pieChartFile);

            // Generate the BarChart image
            File barChartFile = new File("bar_chart.png");
            generateBarChartImage(barChartFile);

            // Generate the StackedBarChart image
            File stackedBarChartFile = new File("stacked_bar_chart.png");
            generateStackedBarChartImage(stackedBarChartFile);

            // Calculate the position and size for the chart images
            float startX = 50;
            float startY = 650;
            float chartWidth = 250;
            float chartHeight = 150;
            float chartGap = 10;

            // Draw the LineChart image on the PDF page
            PDImageXObject lineChartImage = PDImageXObject.createFromFileByContent(lineChartFile, document);
            contentStream.drawImage(lineChartImage, startX, startY, chartWidth, chartHeight);

            // Draw the PieChart image on the PDF page
            float pieChartX = startX + chartWidth + chartGap;
            PDImageXObject pieChartImage = PDImageXObject.createFromFileByContent(pieChartFile, document);
            contentStream.drawImage(pieChartImage, pieChartX, startY, chartWidth, chartHeight);

            // Draw the BarChart image on the PDF page
            float barChartY = startY - chartHeight - chartGap;
            PDImageXObject barChartImage = PDImageXObject.createFromFileByContent(barChartFile, document);
            contentStream.drawImage(barChartImage, startX, barChartY, chartWidth, chartHeight);

            // Draw the StackedBarChart image on the PDF page
            float stackedBarChartX = startX + chartWidth + chartGap;
            PDImageXObject stackedBarChartImage = PDImageXObject.createFromFileByContent(stackedBarChartFile, document);
            contentStream.drawImage(stackedBarChartImage, stackedBarChartX, barChartY, chartWidth, chartHeight);

            contentStream.close();

            // Save the PDF document
            document.save("prestationData.pdf");
            document.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    private void generateLineChartImage(File file) throws IOException {
        // Generate the LineChart using JavaFX and save it as an image file
        Image lineChartImage = eventCount.snapshot(new SnapshotParameters(), null);
        BufferedImage bufferedImage = SwingFXUtils.fromFXImage(lineChartImage, null);
        ImageIO.write(bufferedImage, "png", file);
    }

    private void generatePieChartImage(File file) throws IOException {
        // Generate the PieChart using JavaFX and save it as an image file
        Image pieChartImage = foodType.snapshot(new SnapshotParameters(), null);
        BufferedImage bufferedImage = SwingFXUtils.fromFXImage(pieChartImage, null);
        ImageIO.write(bufferedImage, "png", file);
    }

    private void generateStackedBarChartImage(File file) throws IOException {
        // Generate the PieChart using JavaFX and save it as an image file
        Image pieChartImage = tastingCount.snapshot(new SnapshotParameters(), null);
        BufferedImage bufferedImage = SwingFXUtils.fromFXImage(pieChartImage, null);
        ImageIO.write(bufferedImage, "png", file);
    }

    private  void generateBarChartImage(File file)throws  IOException {
        // Generate the PieChart using JavaFX and save it as an image file
        Image pieChartImage = coursesCount.snapshot(new SnapshotParameters(), null);
        BufferedImage bufferedImage = SwingFXUtils.fromFXImage(pieChartImage, null);
        ImageIO.write(bufferedImage, "png", file);
    }
}
