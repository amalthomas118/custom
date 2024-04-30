<?php
// Define the shortcode for displaying news
function newsapi_news_shortcode() {
    // Your NewsAPI key
    $api_key = 'pub_377594a3d2511a88b09bf920136e1c9a04e4b';

    // NewsAPI endpoint
    $api_url = 'https://newsdata.io/api/1/news?apikey=pub_377594a3d2511a88b09bf920136e1c9a04e4b&size=6 ';

    // Parameters for the API request
    $query_params = [
        'q' => 'sports',
        'apiKey' => $api_key,
    ];

    // Construct the API request URL
    $request_url = add_query_arg($query_params, $api_url);

    // Make the API request
    $response = wp_remote_get($request_url);

    // Check if the request was successful
    if (is_array($response) && !is_wp_error($response)) {
        // Decode the JSON response
        $data = json_decode($response['body']);

        // Display the news articles
        if ( $data->status === 'success') {
            $news_articles = $data->results;
            //print_r($news_articles);

            // Output the news articles in boxes
            foreach ($news_articles as $article) { 
                //print_r($article);?>
            <div class="news-slider__item swiper-slide">
                <a href=" <?php echo $article->link; ?>" class="news__item">
                    <div class="news-date">
                        <span class="news-date__title">25</span>
                        <span class="news-date__txt">May</span>
                    </div>
                    <div class="news__title">
                        <?php echo $article->title; ?>
                    </div>

                    <p class="news__txt">
                    <?php echo substr(strip_tags($article->description), 0 ,100) ; ?>
                    </p>
                    <div class="news__img">
                        <img src=" <?php echo $article->image_url; ?>" alt="news">
                    </div>
                </a>
            </div>
                <?php
            }
        } else {
            //Handle API response error

           echo "error";

             print_r( $response);
            
        }
    } else {
        // Handle API request error
        echo 'Error fetching news api request.';
    }
}

// Register the shortcode
add_shortcode('newsapi_news', 'newsapi_news_shortcode');

?>