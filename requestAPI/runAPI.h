FILE *outputFile;

size_t write_callback(char *ptr, size_t size, size_t nmemb, void *userdata) {
    size_t written = fwrite(ptr, size, nmemb, outputFile);
    return written;
}


void runApi(char *url, char *filename) {
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

        // Open the output file for writing
        outputFile = fopen(filename, "wb");
        if (outputFile == NULL) {
            fprintf(stderr, "Failed to open file: %s\n", filename);
            return;
        }

        // Perform the request
        res = curl_easy_perform(curl);
        if (res != CURLE_OK) {
            fprintf(stderr, "curl_easy_perform() failed: %s\n", curl_easy_strerror(res));
        }

        // Cleanup
        curl_slist_free_all(headers);
        curl_easy_cleanup(curl);

        // Close the output file
        fclose(outputFile);
    }
}
