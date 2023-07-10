package com.cookmasterapplication;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ListView;

import androidx.fragment.app.Fragment;

import java.util.ArrayList;
import java.util.List;

public class CoursesActivity extends Fragment {

    public CoursesActivity() {}

    private List<Courses> getCourses(){
        List<Courses> courses = new ArrayList<>();
        courses.add(new Courses(10, "Dessers avec Mr.Jean", "Création de dessert", "01/01/2020", 3, "Paris 14", "Jean", 1));
        courses.add(new Courses(11, "Pates avec Mr.Jean", "Création de pates", "02/01/2020", 3, "Paris 12", "Jean", 1));
        courses.add(new Courses(12, "Poulet avec Mr.Jean", "Création de poulet", "03/01/2020", 3, "Paris 2", "Jean", 1));
        return courses;
    }

    private ListView listView;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.activity_courses, container, false);

        this.listView = view.findViewById(R.id.lw);
        CourseAdapter courseAdapter = new CourseAdapter(getCourses(), this.getContext());
        this.listView.setAdapter(courseAdapter);

        this.listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                Courses course = (Courses) adapterView.getItemAtPosition(i);
                Intent intent = new Intent(getContext(), CourseDescriptionActivity.class);
                intent.putExtra("name", course.getName());
                intent.putExtra("instructor", course.getInstructor());
                intent.putExtra("date", course.getDate());
                intent.putExtra("description", course.getDescription());
                intent.putExtra("location", course.getLocation());
                intent.putExtra("maxCapacity", course.getMaxCapacity());
                startActivity(intent);
            }
        });


        return view;
    }
}
