<style>
    #adminmenuwrap, #adminmenuback{
        display:none;
    }
    #wpcontent{
        margin-left: 15px;
    }
</style>
<div class="wrap">
  <h2 id="add-new-user"><?php echo $page_title; ?></h2>
    
  <form id="sample_edit_form" name="sample_edit_form" method="post" action="<?php echo $this->base_url; ?>&sampleId=<?php echo $this->sampleId; ?>" enctype="multipart/form-data">

    <table class="form-table">
      <tbody>
        <tr class="form-field form-required">
          <th scope="row"><label>Caption</label></th>
          <td><input type="text" id="title" name="wa_data[title]" value="<?php echo $row->title; ?>" /></td>
        </tr>

		<tr class="form-field">
            <th scope="row"><label>Image</label></th>
            <td class="upload_image">
                <?php				
                if($row->image){
                    echo wp_get_attachment_image( $row->image, array(48,48)) .'<br />';
                }
                ?>
                <div><span id="image"></span></div>
                <input type="hidden" name="wa_data[image]" class="frp_upload" value="" />
                <input type="button" value="Upload Image" class="upload_button" style="width:100px;"/>
            </td>
        </tr>

        <tr class="form-field">
            <th scope="row"><label>Ordering</label></th>
            <td><input type="text" name="wa_data[ordering]" value="<?php echo $row->ordering; ?>" style="width: 80px;"/></td>
        </tr>

        <tr>
            <th scope="row"><label>Staus</label></th>
            <td>
                <input type="radio" name="wa_data[published]" value="1" checked="checked" > Published  &nbsp;
                <input type="radio" name="wa_data[published]" value="0" <?php if(!$row->published && $row->ID){ echo 'checked="checked"';} ?>> Unpublished
            </td>
        </tr>
        
      </tbody>
    </table>
    
    <p class="submit">
      <input type="submit" value="<?php echo $submit_btn_text; ?>" class="button-primary" id="btn-submit" name="wa_data[btn-submit]">
      <input type="hidden" value="<?php echo $this->sampleId; ?>" name="wa_data[sample_id]" />
      <input type="hidden" value="save" name="wa_data[action]">
      <input type="hidden" value="<?php echo $row->ID; ?>" name="wa_data[id]">
    </p>
    
  </form>
</div>

<style type="text/css">
    .small-text{
        width: 150px !important;
    }
</style>

<script language="JavaScript">
    jQuery(document).ready(function() {
        var orig_send_to_editor = window.send_to_editor;
        jQuery('.upload_button').click(function() {
            uploadID = jQuery(this).prev('input');
            spanID = jQuery(this).parent().find('span');
            imageID = jQuery(this).parent().parent().find('img');
            formfield = jQuery('.frp_upload').attr('name');
            tb_show('', 'media-upload.php?type=image&TB_iframe=true');


            window.send_to_editor = function(html) {
                var classes = jQuery('img', html).attr('class');
                var id = classes.replace(/(.*?)wp-image-/, '');
                uploadID.val(id);
                imgurl = jQuery(html).find('img').attr('title');
                imageID.remove();
                spanID.html(imgurl);
                tb_remove();
                window.send_to_editor = orig_send_to_editor;

            }
            return false;
        });
    });
</script>