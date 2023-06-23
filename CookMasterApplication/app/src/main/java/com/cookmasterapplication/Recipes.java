package com.cookmasterapplication;

public class Recipes {

    private String name;
    private String difficulty;
    private String time;
    private String author;
    private long id;

    private String imageId;

    public Recipes(String name, String difficulty, String time, String author, long id, String imageId) {
        this.name = name;
        this.difficulty = difficulty;
        this.time = time;
        this.author = author;
        this.id = id;
        this.imageId = imageId;
    }

    public Recipes(String name, String difficulty, String time, String author) {
        this.name = name;
        this.difficulty = difficulty;
        this.time = time;
        this.author = author;
    }

    public String getName() {
        return name;
    }

    public String getDifficulty() {
        return difficulty;
    }

    public String getTime() {
        return time;
    }

    public String getAuthor() {
        return author;
    }

    public long getId() {
        return id;
    }

    public String getImageId() {
        return imageId;
    }
}

