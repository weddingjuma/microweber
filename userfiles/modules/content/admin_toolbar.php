<?php

    $type = 'page';

?>

<div class="admin-manage-toolbar-holder">
    <div class="admin-manage-toolbar">
    <div class="admin-manage-toolbar-content">
     <?php if(!isset($edit_page_info)): ?>
        <div class="mw-ui-row">
          <div class="mw-ui-col">
              <?php if(isset($page_info) and is_array($page_info)): ?>
              <?php if($page_info['is_shop'] == 'y'){ $type='shop'; } elseif($page_info['subtype'] == 'dynamic'){ $type='dynamicpage'; } else{ $type='page';  }; ?>
              <h2><span class="mw-icon-<?php print $type; ?>"></span><?php print ($page_info['title']) ?></h2>
              <?php else: ?>
              <h2><span class="mw-icon-website"></span><?php _e("Website"); ?></h2>
              <?php endif; ?>
          </div>
          <div class="mw-ui-col" style="text-align: right">




              <?php if(isset($params['page-id']) and intval($params['page-id']) != 0): ?>
              <?php $edit_link = admin_url('view:content#action=editpost:'.$params['page-id']);  ?>
              <a href="<?php print $edit_link; ?>" class="mw-ui-btn edit-content-btn" id="edit-content-btn" data-tip="bottom-left"> <span class="mw-icon-pen"></span> <?php _e("Edit page"); ?> </a>
              <?php endif; ?>
              <?php if(isset($params['category-id'])): ?>
              <?php $edit_link = admin_url('view:content#action=editcategory:'.$params['category-id']);  ?>
              <a href="<?php print $edit_link; ?>" class="mw-ui-btn edit-category-btn" id="edit-category-btn" data-tip="bottom-left"> <span class="mw-icon-pen"></span> <?php _e("Edit category"); ?> </a>
              <?php endif; ?>


               <input class="mw-ui-searchfield" type="text" name="search" placeholder="<?php _e("Search"); ?>..." />

           </div>

    <?php else: ?>
        <div class="mw-ui-row">
            <div class="mw-ui-col">
             <?php
			 if($edit_page_info['is_shop'] == 'y'){ $type='shop'; } elseif($edit_page_info['subtype'] == 'dynamic'){ $type='dynamicpage'; } else{ $type='page';  };
			  
            	 $action_text =  _e("Creating new", true);
            	 if(isset($edit_page_info['id']) and intval($edit_page_info['id']) != 0){
            	    $action_text = _e("Editting", true);
            	 }
            	 $action_text2 = 'page';
            	 if(isset($edit_page_info['content_type']) and $edit_page_info['content_type'] == 'post' and isset($edit_page_info['subtype'])){
            	    $action_text2 = $edit_page_info['subtype'];
            	 }
            	 $action_text = $action_text. ' '. $action_text2;
			  if(isset($edit_page_info['title'])): ?>

             <div class="mw-ui-row" id="content-title-field-row">
                <div class="mw-ui-col" style="width: 25px;">
                   <span class="mw-icon-<?php print $type; ?> admin-manage-toolbar-title-icon"></span>
                </div>
                  <div class="mw-ui-col">
                    <input type="text" class="mw-ui-invisible-field mw-ui-field-big" value="<?php print $edit_page_info['title'] ?>" id="content-title-field" <?php if($edit_page_info['title'] == false): ?> placeholder="<?php print $action_text ?>"  <?php endif; ?> />
                  </div>
              </div>
              <script>mwd.getElementById('content-title-field').focus();</script>
              <?php else: ?>
              <?php if($edit_page_info['is_shop'] == 'y'){ $type='shop'; } elseif($edit_page_info['subtype'] == 'dynamic'){ $type='dynamicpage'; } else{ $type='page';  }; ?>
               <h2>
                     <span class="mw-icon-<?php print $type; ?>"></span><?php print $action_text ?>
              </h2>
              <?php endif; ?>



        </div>
            <div class="mw-ui-col" id="content-title-field-buttons">

                <div class="mw-ui-btn-nav"><?php /*<span class="mw-ui-btn"><span class="mw-icon-gear" title="<?php _e("Settings"); ?>" style="font-size: 19px;"></span></span>*/ ?>


            <?php if($data['is_active'] == 'n'){ ?>
            <span
                onclick="mw.admin.postStates.toggle()"
                data-val="n"
                class="mw-ui-btn mw-ui-btn-icon btn-posts-state tip"
                data-tip="<?php _e("Unpublished"); ?>"
                data-tipposition="left-center"><span class="mw-icon-unpublish"></span></span>
            <?php } else{  ?>

            <span
                onclick="mw.admin.postStates.toggle()"
                data-val="y"
                class="mw-ui-btn mw-ui-btn-icon btn-posts-state tip"
                data-tip="<?php _e("Published"); ?>"
                data-tipposition="left-center"><span class="mw-icon-check"></span></span>

        <?php    } ?>


            <?php if($is_live_edit == false) : ?>

                    <button type="button" class="mw-ui-btn" onclick="mw.edit_content.handle_form_submit(true);" data-text="<?php _e("Live Edit"); ?>">
                    <span class="mw-icon-live"></span><?php _e("Live Edit"); ?>
                    </button>
                    <button type="submit" class="mw-ui-btn mw-ui-btn-invert" form="quickform-<?php print $rand; ?>">
                    <?php _e("Save"); ?>
                    </button>
                    <?php else: ?>
                    <?php if($data['id'] == 0): ?>
                    <button type="submit" class="mw-ui-btn" onclick="mw.edit_content.handle_form_submit(true);" data-text="<?php _e("Live Edit"); ?>" form="quickform-<?php print $rand; ?>">
                    <span class="mw-icon-live"></span><?php _e("Live Edit"); ?>
                    </button>
                    <?php else: ?>
                    <button type="button" class="mw-ui-btn" onclick="mw.edit_content.handle_form_submit(true);" data-text="<?php _e("Live Edit"); ?>">
                    <span class="mw-icon-live"></span><?php _e("Live Edit"); ?>
                    </button>
                    <?php endif; ?>
                    <button type="submit" class="mw-ui-btn mw-ui-btn-invert" form="quickform-<?php print $rand; ?>">
                    <?php _e("Save"); ?>
                    </button>
            <?php endif; ?>

            </div>
        </div>
        <script>mw.admin.titleColumnNavWidth();</script>




      
	<?php endif; ?> 

    


    
    
        </div>





    </div>
    </div>
</div>