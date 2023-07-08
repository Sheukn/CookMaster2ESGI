package reportApp.Application;

public class Users {
    private int id;
    private String mail;
    private String nom;
    private String prenom;
    private String sub;

    public Users(int id, String mail, String nom, String prenom, String sub) {
        this.id = id;
        this.mail = mail;
        this.nom = nom;
        this.prenom = prenom;
        this.sub = sub;
    }

    public int getId() {
        return id;
    }

    public String getMail() {
        return mail;
    }

    public String getNom() {
        return nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public String getSub() {
        return sub;
    }
}
