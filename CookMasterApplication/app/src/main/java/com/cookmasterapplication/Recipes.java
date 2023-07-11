package com.cookmasterapplication;

public class Recipes {

    private long id;
    private String category;
    private String name;
    private String description;
    private int prep_time;
    private int cooking_time;
    private int number_of_persons;
    private String type;
    private String gastronomy;
    private String difficulty;
    private boolean is_bookmarked;
    private String imageId;

    public Recipes(long id, String category, String name, String description, int prep_time, int cooking_time, int number_of_persons, String type, String gastronomy, String difficulty, boolean is_bookmarked, String imageId) {
        this.id = id;
        this.category = category;
        this.name = name;
        this.description = description;
        this.prep_time = prep_time;
        this.cooking_time = cooking_time;
        this.number_of_persons = number_of_persons;
        this.type = type;
        this.gastronomy = gastronomy;
        this.difficulty = difficulty;
        this.is_bookmarked = is_bookmarked;
        this.imageId = imageId;
    }

    public String getCategory() {
        return category;
    }

    public String getName() {
        return name;
    }

    public String getDescription() {
        return description;
    }

    public int getPrep_time() {
        return prep_time;
    }

    public int getCooking_time() {
        return cooking_time;
    }

    public int getNumber_of_persons() {
        return number_of_persons;
    }

    public String getType() {
        return type;
    }

    public String getGastronomy() {
        return gastronomy;
    }

    public String getDifficulty() {
        return difficulty;
    }

    public boolean isIs_bookmarked() {
        return is_bookmarked;
    }

    public String getImageId() {
        return imageId;
    }

    public long getId() {
        return id;
    }
}

