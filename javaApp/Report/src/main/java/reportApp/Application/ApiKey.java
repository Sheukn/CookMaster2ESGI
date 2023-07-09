package reportApp.Application;

public class ApiKey {

    private static final ApiKey instance = new ApiKey();

    private String id;
    private String password;
    private ApiKey() {}

    public static ApiKey getInstance() {
        return instance;
    }

    public void setId(String id) {
        this.id = id;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getId() {
        return id;
    }

    public String getPassword() {
        return password;
    }

}
