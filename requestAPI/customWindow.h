void runCustom(GtkWidget *button, gpointer user_data) {
    GtkWidget *window = GTK_WIDGET(user_data);
    GtkWidget *form = gtk_bin_get_child(GTK_BIN(window));
    GtkWidget *urlEntry = gtk_grid_get_child_at(GTK_GRID(form), 1, 0);

    GtkWidget *parameter1Name = gtk_grid_get_child_at(GTK_GRID(form), 1, 4);
    GtkWidget *parameter1Value = gtk_grid_get_child_at(GTK_GRID(form), 2, 4);
    GtkWidget *parameter2Name = gtk_grid_get_child_at(GTK_GRID(form), 1, 5);
    GtkWidget *parameter2Value = gtk_grid_get_child_at(GTK_GRID(form), 2, 5);
    GtkWidget *parameter3Name = gtk_grid_get_child_at(GTK_GRID(form), 1, 6);
    GtkWidget *parameter3Value = gtk_grid_get_child_at(GTK_GRID(form), 2, 6);
    GtkWidget *scrolledView = gtk_grid_get_child_at(GTK_GRID(form), 1, 8);
    GtkWidget *textView = gtk_bin_get_child(GTK_BIN(scrolledView));

    const char *url = gtk_entry_get_text(GTK_ENTRY(urlEntry));
    
    const char *parameter1 = gtk_entry_get_text(GTK_ENTRY(parameter1Name));
    const char *parameter1Val = gtk_entry_get_text(GTK_ENTRY(parameter1Value));
    const char *parameter2 = gtk_entry_get_text(GTK_ENTRY(parameter2Name));
    const char *parameter2Val = gtk_entry_get_text(GTK_ENTRY(parameter2Value));
    const char *parameter3 = gtk_entry_get_text(GTK_ENTRY(parameter3Name));
    const char *parameter3Val = gtk_entry_get_text(GTK_ENTRY(parameter3Value));

    GtkTextBuffer *buffer = gtk_text_view_get_buffer(GTK_TEXT_VIEW(textView));
    gtk_text_buffer_set_text(buffer, "", -1);

    if (strcmp(url,"") == 0)
        gtk_text_buffer_insert_at_cursor(buffer, "An URL is required\n", -1);      
    else {
        char *fullUrl = (char *) malloc(1000 * sizeof(char));
        strcpy(fullUrl, url);
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

        char filename[] = "output.txt";
        runApi(fullUrl, filename, buffer);
        
        formatToJson(filename, "outputJson.txt");


        // Load the file into the text view
        

        FILE *fp;
        char line[1000];
        fp = fopen("outputJson.txt", "r");
        if (fp == NULL) {
            printf("Error opening file\n");
            exit(1);
        }
        while (fgets(line, sizeof(line), fp)) {
            if (g_utf8_validate(line, -1, NULL)) {
                    gtk_text_buffer_insert_at_cursor(buffer, line, -1);
                }
            else {
                gtk_text_buffer_insert_at_cursor(buffer, "{\n", -1);
            }
        }
        fclose(fp);
        

        
        // Free memory and delete files
        remove("outputJson.txt");
        remove("output.txt");
        free(fullUrl);

    }
}


void startCustomWindow(GtkWidget *button, gpointer user_data){
    
    GtkWidget *window = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    gtk_window_set_title(GTK_WINDOW(window), "Custom");
    gtk_window_set_default_size(GTK_WINDOW(window), 1000, 700);
    gtk_container_set_border_width(GTK_CONTAINER(window), 10);

    GtkWidget *form = gtk_grid_new();

    GtkWidget *url = gtk_label_new("URL :");
    GtkWidget *urlEntry = gtk_entry_new();
    gtk_grid_attach(GTK_GRID(form), url, 0, 0, 1, 1);
    gtk_grid_attach(GTK_GRID(form), urlEntry, 1, 0, 1, 1);

    // GtkWidget *method = gtk_label_new("Method :");
    // GtkWidget *methodEntry = gtk_combo_box_text_new();

    // gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "GET");
    // gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "POST");
    // gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "PUT");
    // gtk_combo_box_text_append(GTK_COMBO_BOX_TEXT(methodEntry), NULL, "DELETE");

    // gtk_combo_box_set_active(GTK_COMBO_BOX(methodEntry), 0);

    // gtk_grid_attach(GTK_GRID(form), method, 0, 1, 1, 1);
    // gtk_grid_attach(GTK_GRID(form), methodEntry, 1, 1, 1, 1);

    // GtkWidget *apiKey = gtk_label_new("API Key :");
    // GtkWidget *apiKeyEntry = gtk_entry_new();
    // gtk_grid_attach(GTK_GRID(form), apiKey, 0, 2, 1, 1);
    // gtk_grid_attach(GTK_GRID(form), apiKeyEntry, 1, 2, 1, 1);


    GtkWidget *parameters = gtk_label_new("Parameters :");
    gtk_grid_attach(GTK_GRID(form), parameters, 0, 3, 1, 1);
    gtk_widget_set_margin_top(parameters, 10);
    gtk_widget_set_margin_bottom(parameters, 10);

    GtkWidget *name = gtk_label_new("Name :");
    gtk_grid_attach(GTK_GRID(form), name, 1, 3, 1, 1);
    gtk_widget_set_margin_top(name, 10);
    gtk_widget_set_margin_bottom(name, 10);

    GtkWidget *value = gtk_label_new("Value :");
    gtk_grid_attach(GTK_GRID(form), value, 2, 3, 1, 1);
    gtk_widget_set_margin_top(value, 10);
    gtk_widget_set_margin_bottom(value, 10);
    

    
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


    GtkWidget *textView = gtk_text_view_new();
    gtk_text_view_set_editable(GTK_TEXT_VIEW(textView), FALSE);


    GtkWidget *scrolledWindow = gtk_scrolled_window_new(NULL, NULL);
    gtk_container_add(GTK_CONTAINER(scrolledWindow), textView);
    gtk_scrolled_window_set_min_content_height(GTK_SCROLLED_WINDOW(scrolledWindow), 300);
    gtk_scrolled_window_set_min_content_width(GTK_SCROLLED_WINDOW(scrolledWindow), 800);
    gtk_grid_attach(GTK_GRID(form), scrolledWindow, 1, 8, 2, 1);


    gtk_widget_set_halign(form, GTK_ALIGN_CENTER);
    gtk_widget_set_valign(form, GTK_ALIGN_CENTER);
    gtk_container_add(GTK_CONTAINER(window), form);
    gtk_widget_show_all(window);
}