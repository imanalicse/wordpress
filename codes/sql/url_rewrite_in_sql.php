UPDATE wp_options SET option_value = replace(option_value, 'http://www.oldurl', 'http://www.newurl') WHERE option_name = 'home' OR option_name = 'siteurl';

UPDATE wp_posts SET guid = replace(guid, 'http://www.oldurl','http://www.newurl');

UPDATE wp_posts SET post_content = replace(post_content, 'http://www.oldurl', 'http://www.newurl');

UPDATE wp_postmeta SET meta_value = replace(meta_value,'http://www.oldurl','http://www.newurl');

Example=====================================

UPDATE wp_options SET option_value = replace(option_value, 'http://localhost/wp_template', 'http://larry.webmascot.com/wp_template') WHERE option_name = 'home' OR option_name = 'siteurl';

UPDATE wp_posts SET guid = replace(guid, 'http://localhost/wp_template','http://larry.webmascot.com/wp_template');

UPDATE wp_posts SET post_content = replace(post_content, 'http://localhost/wp_template', 'http://larry.webmascot.com/wp_template');

UPDATE wp_postmeta SET meta_value = replace(meta_value,'http://localhost/wp_template','http://larry.webmascot.com/wp_template');

========================================

SET @oldurl = 'http://larry.webmascot.com/wp_template';
SET @newurl = 'http://larry.webmascot.com/wa';

UPDATE wp_options SET option_value = replace(option_value, @oldurl, @newurl) WHERE option_name = 'home' OR option_name = 'siteurl';
UPDATE wp_posts SET guid = replace(guid, @oldurl,@newurl);
UPDATE wp_posts SET post_content = replace(post_content, @oldurl, @newurl);
UPDATE wp_postmeta SET meta_value = replace(meta_value,@oldurl, @newurl);



URL rewrite sql for wordpress