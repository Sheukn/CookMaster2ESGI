size_t write_callback(char *ptr, size_t size, size_t nmemb, void *userdata) {
    printf("%.*s\n", (int)(size * nmemb), ptr);
    return size * nmemb;
}

void runApi(char *url){
    CURL *curl;
    CURLcode res;
    
    curl = curl_easy_init();
    if (curl) {
        // Set the URL
        curl_easy_setopt(curl, CURLOPT_URL, url);

        // Set the request method
        curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "GET");

        // Set the request headers
        struct curl_slist *headers = NULL;
        headers = curl_slist_append(headers, "Content-Type: application/json");
        curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);

        // Set the callback function to handle the response
        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, write_callback);

        // Perform the request
        res = curl_easy_perform(curl);
        if (res != CURLE_OK) {
            fprintf(stderr, "curl_easy_perform() failed: %s\n", curl_easy_strerror(res));
        }

        

        // Cleanup
        curl_slist_free_all(headers);
        curl_easy_cleanup(curl);
    }
}
