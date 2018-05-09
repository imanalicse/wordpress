<div class="wrap">
  <h2 id="add-new-user"><?php echo $page_title; ?></h2>
    
  <form id="sample_edit_form" name="sample_edit_form" method="post" action="<?php echo $this->base_url; ?>" enctype="multipart/form-data">  
    
    <table class="form-table">
      <tbody>
        <tr class="form-field form-required">
          <th scope="row"><label>Title</label></th>
          <td><input type="text" id="title" name="wa_data[title]" value="<?php echo $row->title; ?>" /></td>
        </tr>
        <tr class="form-field form-required">
            <th scope="row"><label>Slug</label></th>
            <td><input type="text"id="slug" name="wa_data[slug]" value="<?php echo $row->slug; ?>" /></td>
        </tr>
        <tr>
          <th scope="row"><label>Description</label></th>
          <td>
            <div class="wp-editor-container" id="wp-content-editor-container">
          	 <?php echo the_editor($row->description, "wa_data[description]", "", true); ?>
          	</div>
		  </td>
        </tr>

        <?php
            $SampleCategories = new SampleCategories();
            $categories = $SampleCategories->getCategories();
        ?>

		<tr class="form-field form-required">
          <th scope="row"><label>Category</label></th>
          <td>
		  <select id="catid" name="wa_data[catid]">
			<?php				
				if(sizeof($categories)>0){
					foreach($categories as $category){
                        $selected = "";
                        if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] == $category->ID){
                            $selected = "selected='selected'";
                        }else if($row->catid == $category->ID){
                            $selected = "selected='selected'";
                        }
						?>
						<option value="<?php echo $category->ID; ?>" <?php echo $selected; ?>><?php echo $category->title; ?></option>
						<?php 	
					}
				}
			?>
			</select>
		  </td>
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
            <th scope="row"><label>Status</label></th>
            <td>
                <input type="radio" name="wa_data[published]" value="1" checked="checked" > Published  &nbsp;
                <input type="radio" name="wa_data[published]" value="0" <?php if(!$row->published && $row->ID){ echo 'checked="checked"';} ?>> Unpublished
            </td>
        </tr>
      </tbody>
    </table>
    
    <p class="submit">
      <input type="submit" value="<?php echo $submit_btn_text; ?>" class="button-primary" id="btn-submit" name="wa_data[btn-submit]">
      <input type="hidden" value="save" name="wa_data[action]">
      <input type="hidden" value="<?php echo $row->ID; ?>" name="wa_data[id]" id="sample_id">
      <input type="hidden" value="<?php echo $_REQUEST['cat_id']; ?>" name="wa_data[redirect_cat_id]">
      <input type="hidden" value="<?php echo $_REQUEST['paged']; ?>" name="wa_data[paged]">

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
	
		jQuery('.button-primary').click( function(event){			
			if(jQuery('#title').val()==''){
				alert("Title is required field.");
				event.preventDefault();
			}
            if(jQuery('#catid').val()==null){
				alert("Please create category first.");
				event.preventDefault();
			}
		});

        // START: slug generate
        jQuery('#sample_edit_form #title').keyup(function() {
            var str = this.value;
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    "action": "generate_slug",
                    "str":str,
                },
                success: function(response){
                    jQuery('#sample_edit_form #slug').val(response);
                }
            });
        });
        // END: slug generate

        // START: slug checking
        jQuery('#sample_edit_form').submit(function(ev) {
            var slug = jQuery(this).find('#slug').val();
            var sample_id = jQuery(this).find('#sample_id').val();
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    "action": "check_slug",
                    "slug":slug,
                    "id":sample_id,
                    "table_name":'samples'
                },
                async: false,
                success: function(response){
                    if(response>0){
                        alert('Same sample category already exist. Please change.');
                        ev.preventDefault();
                    }else{
                        jQuery(this).submit();
                    }
                }
            });
        });
        // END: slug checking

    });
</script>