UPDATE wp_posts SET post_content = REPLACE(post_content,'www.domain.com/wp-content/uploads','www.domain.com/images');

UPDATE wp_posts SET guid = REPLACE(guid,'www.domain.com/wp-content/uploads','www.domain.com/images');