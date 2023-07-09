package com.cookmasterapplication;
import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

public class CourseDescriptionActivity extends AppCompatActivity implements OnMapReadyCallback{

    Button subscribeButton, unsubscribeButton;

    TextView courseName, courseChef, courseCount, courseAddress;
    String address;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_courses_description);
        Bundle extras = getIntent().getExtras();
        String name = extras.getString("name");
        String instructor = extras.getString("instructor");
        int maxCapacity = extras.getInt("maxCapacity");
        address = extras.getString("location");
        int capacity = 10;

        courseName = findViewById(R.id.courseName);
        courseChef = findViewById(R.id.courseChef);
        courseCount = findViewById(R.id.courseCount);
        courseAddress = findViewById(R.id.courseAddress);
        subscribeButton = findViewById(R.id.sub);

        String capacityString = capacity + " / " + maxCapacity;


        courseName.setText(name);
        courseChef.setText(instructor);
        courseCount.setText(capacityString);
        courseAddress.setText(address);


        if(capacity == maxCapacity){
            // Delete subscribe button
            subscribeButton.setVisibility(View.GONE);
        }

        // Get a handle to the fragment and register the callback.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);

    }

    // Get a handle to the GoogleMap object and display marker.
    @Override
    public void onMapReady(GoogleMap googleMap) {

        if (address.equals("Paris 12")){
            LatLng location = new LatLng( 48.84153478217743, 2.3905885898623316);
            googleMap.addMarker(new MarkerOptions()
                    .position(location)
                    .title("Cookmaster Paris 12"));
            googleMap.moveCamera(CameraUpdateFactory.newLatLngZoom(location, 15));
        }

        if (address.equals("Paris 2")){
            LatLng location = new LatLng( 48.86695079486519, 2.3404346377574807);
            googleMap.addMarker(new MarkerOptions()
                    .position(location)
                    .title("Cookmaster Paris 2"));
            googleMap.moveCamera(CameraUpdateFactory.newLatLngZoom(location, 15));
        }

        if (address.equals("Paris 14")){
            LatLng location = new LatLng( 48.83327426637909, 2.327725846454093);
            googleMap.addMarker(new MarkerOptions()
                    .position(location)
                    .title("Cookmaster Paris 14"));
            googleMap.moveCamera(CameraUpdateFactory.newLatLngZoom(location, 15));
        }
    }
}
