package com.cookmasterapplication;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.List;

public class CourseAdapter extends BaseAdapter {

        private List<Courses> courses;

        private Context context;

        public CourseAdapter(List<Courses> courses, Context context) {
            this.courses = courses;
            this.context = context;
        }

    @Override
    public int getCount() {
        return this.courses.size();
    }

    @Override
    public Object getItem(int i) {
        return this.courses.get(i);
    }

    @Override
    public long getItemId(int i) {
        return this.courses.get(i).getId();
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        if (view == null){
            LayoutInflater inflater = LayoutInflater.from(this.context);
            view = inflater.inflate(R.layout.courses_rows, null);
        }

        Courses courses = this.courses.get(i);

        TextView name = view.findViewById(R.id.name);
        name.setText(courses.getName());

        TextView description = view.findViewById(R.id.description);
        description.setText(courses.getDescription());

        TextView duration = view.findViewById(R.id.time);
        duration.setText(String.valueOf(courses.getTime()));

        TextView date = view.findViewById(R.id.date);
        date.setText(courses.getDate());

        TextView location = view.findViewById(R.id.location);
        location.setText(courses.getLocation());

        TextView instructor = view.findViewById(R.id.instructor);
        instructor.setText(courses.getInstructor());

        TextView maxCapacity = view.findViewById(R.id.capacity);
        maxCapacity.setText(String.valueOf(courses.getMaxCapacity()));
        return view;
    }
}
