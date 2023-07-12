package reportApp.Application;

public class Token {

    private static Token instance;
    private String token;
    public static Token getInstance() {
        if (instance == null) {
            instance = new Token();
        }
        return instance;
    }

    public String getToken() {
        return token;
    }

    public void setToken(String token) {
        System.out.println("Token set to " + token);
        this.token = token;
    }
}
