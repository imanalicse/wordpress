<style type="text/css">
    .setting-table .text-field{
        width:50% !important;
    }
</style>
<div class="wrap">
  <h2 id="add-new-user"><?php echo $page_title; ?></h2>

  <form id="news-edit-form" name="news-edit-form" method="post" action="<?php echo $this->base_url; ?>" enctype="multipart/form-data">

    <table class="form-table setting-table">
      <tbody>
        <tr class="form-field form-required">
            <th scope="row"><label>Facebook</label></th>
            <td><input type="text" name="form_data[facebook_link][facebook_link]" value="<?php echo get_option('facebook_link') ?>" class="text-field"/></td>
        </tr>
        <tr class="form-field form-required">
            <th scope="row"><label>Twitter</label></th>
            <td><input type="text" name="form_data[twitter_link][twitter_link]" value="<?php echo get_option('twitter_link') ?>" class="text-field"/></td>
        </tr>
        <tr class="form-field form-required">
            <th scope="row"><label>Instagram </label></th>
            <td><input type="text" name="form_data[instagram_link][instagram_link]" value="<?php echo get_option('instagram_link') ?>" class="text-field"/></td>
        </tr>
        <tr class="form-field form-required">
            <th scope="row"><label>Google plus</label></th>
            <td><input type="text" name="form_data[google_plus_link][google_plus_link]" value="<?php echo get_option('google_plus_link') ?>" class="text-field"/></td>
        </tr>
      </tbody>
    </table>

    <p class="submit">
      <input type="submit" value="<?php echo $submit_btn_text; ?>" class="button-primary" id="btn-submit" name="form_data[btn-submit]">
      <input type="hidden" value="save" name="form_data[action]">
    </p>

  </form>
</div>