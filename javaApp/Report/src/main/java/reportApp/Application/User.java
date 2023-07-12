package reportApp.Application;

import java.util.Date;

public class User {

    private int id;
    private String email;
    private String name;
    private String firstname;
    private String subscription;

    private Date date;

    public User(int id, String mail, String nom, String firstname, String subscription, Date date) {
        this.id = id;
        this.email = mail;
        this.name = nom;
        this.firstname = firstname;
        this.subscription = subscription;
        this.date = date;
    }

    public int getId() {
        return id;
    }

    public String getEmail() {
        return email;
    }

    public String getName() {
        return name;
    }

    public String getFirstname() {
        return firstname;
    }

    public String getSubscription() {
        return subscription;
    }

    public Date getDate() {
        return date;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setNom(String nom) {
        this.name = nom;
    }

    public void setFirstname(String firstname) {
        this.firstname = firstname;
    }

    public void setSubscription(String subscription) {
        this.subscription = subscription;
    }

    public void setDate(Date date) {
        this.date = date;
    }
}
