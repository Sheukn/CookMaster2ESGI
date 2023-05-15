void runCustom(GtkWidget *button, gpointer user_data) {
    GtkWidget *window = GTK_WIDGET(user_data);
    GtkWidget *form = gtk_bin_get_child(GTK_BIN(window));
    GtkWidget *urlEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 0);
    GtkWidget *methodEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 1);
    GtkWidget *apiKeyEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 2);
    GtkWidget *parameter1Name = gtk_grid_get_child_at(GTK_GRID(form), 1, 4);
    GtkWidget *parameter1Value = gtk_grid_get_child_at(GTK_GRID(form), 2, 4);
    GtkWidget *parameter2Name = gtk_grid_get_child_at(GTK_GRID(form), 1, 5);
    GtkWidget *parameter2Value = gtk_grid_get_child_at(GTK_GRID(form), 2, 5);
    GtkWidget *parameter3Name = gtk_grid_get_child_at(GTK_GRID(form), 1, 6);
    GtkWidget *parameter3Value = gtk_grid_get_child_at(GTK_GRID(form), 2, 6);

    const char *url = gtk_entry_get_text(GTK_ENTRY(urlEntry));
    const char *method = gtk_combo_box_text_get_active_text(GTK_COMBO_BOX_TEXT(methodEntry));
    const char *apiKey = gtk_entry_get_text(GTK_ENTRY(apiKeyEntry));
    const char *parameter1 = gtk_entry_get_text(GTK_ENTRY(parameter1Name));
    const char *parameter1Val = gtk_entry_get_text(GTK_ENTRY(parameter1Value));
    const char *parameter2 = gtk_entry_get_text(GTK_ENTRY(parameter2Name));
    const char *parameter2Val = gtk_entry_get_text(GTK_ENTRY(parameter2Value));
    const char *parameter3 = gtk_entry_get_text(GTK_ENTRY(parameter3Name));
    const char *parameter3Val = gtk_entry_get_text(GTK_ENTRY(parameter3Value));

    if (strcmp(url,"") == 0 || strcmp(apiKey, "") == 0)
        printf("URL or API Key are required\n");

    else {
        char *fullUrl = (char *) malloc(1000 * sizeof(char));
        strcpy(fullUrl, url);
        strcat(fullUrl, "?apiKey=");
        strcat(fullUrl, apiKey);
        if (strcmp(parameter1, "") != 0 && strcmp(parameter1Val, "") != 0) {
            strcat(fullUrl, "&");
            strcat(fullUrl, parameter1);
            strcat(fullUrl, "=");
            strcat(fullUrl, parameter1Val);
        }
        if (strcmp(parameter2, "") != 0 && strcmp(parameter2Val, "") != 0) {
            strcat(fullUrl, "&");
            strcat(fullUrl, parameter2);
            strcat(fullUrl, "=");
            strcat(fullUrl, parameter2Val);
        }
        if (strcmp(parameter3, "") != 0 && strcmp(parameter3Val, "") != 0) {
            strcat(fullUrl, "&");
            strcat(fullUrl, parameter3);
            strcat(fullUrl, "=");
            strcat(fullUrl, parameter3Val);
        }

        printf("%s\n", fullUrl);
    }

}



void startCustomWindow(GtkWidget *button, gpointer user_data){
    
    GtkWidget *window = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    gtk_window_set_title(GTK_WINDOW(window), "Custom");
    gtk_window_set_default_size(GTK_WINDOW(window), 500, 500);
    gtk_container_set_border_width(GTK_CONTAINER(window), 10);

    GtkWidget *form = gtk_grid_new();

    GtkWidget *url = gtk_label_new("URL :");
    GtkWidget *urlEntry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(form), url, 0, 0, 1, 1);
    gtk_grid_attach(GTK_GRID(form), urlEntry, 1, 0, 1, 1);

    GtkWidget *method = gtk_label_new("Method :");
    GtkWidget *methodEntry = gtk_combo_box_text_new();

    gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "GET");
    gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "POST");
    gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "PUT");
    gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "DELETE");

    gtk_combo_box_set_active(GTK_COMBO_BOX(methodEntry), 0);

    gtk_grid_attach(GTK_GRID(form), method, 0, 1, 1, 1);
    gtk_grid_attach(GTK_GRID(form), methodEntry, 1, 1, 1, 1);

    GtkWidget *apiKey = gtk_label_new("API Key :");
    GtkWidget *apiKeyEntry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(form), apiKey, 0, 2, 1, 1);
    gtk_grid_attach(GTK_GRID(form), apiKeyEntry, 1, 2, 1, 1);

    GtkWidget *parameters = gtk_label_new("Parameters :");
    gtk_grid_attach(GTK_GRID(form), parameters, 0, 3, 1, 1);

    GtkWidget *name = gtk_label_new("Name :");
    gtk_grid_attach(GTK_GRID(form), name, 1, 3, 1, 1);

    GtkWidget *value = gtk_label_new("Value :");
    gtk_grid_attach(GTK_GRID(form), value, 2, 3, 1, 1);

    
    GtkWidget *parameter1 = gtk_label_new("Parameter 1 :");
    GtkWidget *parameter1Name = gtk_entry_new();
    GtkWidget *parameter1Entry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(form), parameter1, 0, 4, 1, 1);
    gtk_grid_attach(GTK_GRID(form), parameter1Name, 1, 4, 1, 1);
    gtk_grid_attach(GTK_GRID(form), parameter1Entry, 2, 4, 1, 1);

    GtkWidget *parameter2 = gtk_label_new("Parameter 2 :");
    GtkWidget *parameter2Name = gtk_entry_new();
    GtkWidget *parameter2Entry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(form), parameter2, 0, 5, 1, 1);
    gtk_grid_attach(GTK_GRID(form), parameter2Name, 1, 5, 1, 1);
    gtk_grid_attach(GTK_GRID(form), parameter2Entry, 2, 5, 1, 1);

    GtkWidget *parameter3 = gtk_label_new("Parameter 3 :");
    GtkWidget *parameter3Name = gtk_entry_new();
    GtkWidget *parameter3Entry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(form), parameter3, 0, 6, 1, 1);
    gtk_grid_attach(GTK_GRID(form), parameter3Name, 1, 6, 1, 1);
    gtk_grid_attach(GTK_GRID(form), parameter3Entry, 2, 6, 1, 1);


    GtkWidget *submitButton = gtk_button_new_with_label("Submit");
    g_signal_connect(submitButton, "clicked", G_CALLBACK(runCustom), window);
    gtk_grid_attach(GTK_GRID(form), submitButton, 1, 7, 2, 1);


    gtk_widget_set_halign(form, GTK_ALIGN_CENTER);
    gtk_widget_set_valign(form, GTK_ALIGN_CENTER);
    gtk_container_add(GTK_CONTAINER(window), form);
    gtk_widget_show_all(window);
}