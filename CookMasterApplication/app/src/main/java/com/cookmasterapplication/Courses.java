package com.cookmasterapplication;

public class Courses {

    private int maxCapacity;
    private String name;
    private String description;
    private String date;
    private int time;
    private String location;
    private String instructor;
    private long id;
    private String imageId;

    public Courses(int maxCapacity, String name, String description, String date, int time, String location, String instructor, long id, String imageId) {
        this.maxCapacity = maxCapacity;
        this.name = name;
        this.description = description;
        this.date = date;
        this.time = time;
        this.location = location;
        this.instructor = instructor;
        this.id = id;
        this.imageId = imageId;
    }

    public Courses(int maxCapacity, String name, String description, String date, int time, String location, String instructor, long id) {
        this.maxCapacity = maxCapacity;
        this.name = name;
        this.description = description;
        this.date = date;
        this.time = time;
        this.location = location;
        this.instructor = instructor;
        this.id = id;
    }

    public int getMaxCapacity() {
        return maxCapacity;
    }

    public String getName() {
        return name;
    }

    public String getDescription() {
        return description;
    }

    public String getDate() {
        return date;
    }

    public int getTime() {
        return time;
    }

    public String getLocation() {
        return location;
    }

    public String getInstructor() {
        return instructor;
    }

    public long getId() {
        return id;
    }

    public String getImageId() {
        return imageId;
    }
}
