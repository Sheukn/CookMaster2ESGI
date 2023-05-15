#include <stdio.h>
#include <curl/curl.h>
#include <stdlib.h>
#include <string.h>
#include <gtk/gtk.h>

#include "runAPI.h"
#include "spoonacularWindow.h"
#include "customWindow.h"

void on_button_clicked(GtkWidget *widget, gpointer data){
    g_print("%s button clicked\n", (char*)data);
}



int main(int argc, char *argv[]){
    GtkWidget *window;
    GtkWidget *vbox;
    GtkWidget *spoonacular, *button2, *button3, *button4;

    gtk_init(&argc, &argv);

    window = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    gtk_window_set_title(GTK_WINDOW(window), "Request APIs");
    gtk_window_set_default_size(GTK_WINDOW(window), 500, 500);
    gtk_container_set_border_width(GTK_CONTAINER(window), 10);

    vbox = gtk_box_new(GTK_ORIENTATION_VERTICAL, 5);
    gtk_container_add(GTK_CONTAINER(window), vbox);

    spoonacular = gtk_button_new_with_label("Spoonacular");
    g_signal_connect(spoonacular, "clicked", G_CALLBACK(startSpoonacular), "Spoonacular");
    gtk_box_pack_start(GTK_BOX(vbox), spoonacular, FALSE, FALSE, 0);

    button4 = gtk_button_new_with_label("Custom");
    g_signal_connect(button4, "clicked", G_CALLBACK(startCustomWindow), "Custom");
    gtk_box_pack_start(GTK_BOX(vbox), button4, FALSE, FALSE, 0);

    g_signal_connect(window, "destroy", G_CALLBACK(gtk_main_quit), NULL);

    gtk_widget_set_halign(vbox, GTK_ALIGN_CENTER);
    gtk_widget_set_valign(vbox, GTK_ALIGN_CENTER);

    gtk_widget_show_all(window);

    gtk_main();

    return 0;
}