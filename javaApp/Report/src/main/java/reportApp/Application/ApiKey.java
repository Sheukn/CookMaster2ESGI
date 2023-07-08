package reportApp.Application;

public class ApiKey {

    private static final ApiKey instance = new ApiKey();
    private String apiKey;
    private ApiKey() {}
    public static ApiKey getInstance() {
        return instance;
    }

    public String getApiKey() {
        return apiKey;
    }

    public void setApiKey(String apiKey) {
        this.apiKey = apiKey;
    }
}
