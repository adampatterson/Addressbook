<?php 
class image_model {

    public function get_images($cid = '', $size = 'small') {
    
        $profile_table = db('profile_photo');
        $profile = $profile_table->select('*')->where('contact_id', '=', $cid)->order_by('profileid', 'ASC')->execute();
        
        $profileid = $profile[0]->profileid;
        $profiledate = $profile[0]->profile_date;
        $profile_filename = $profile[0]->filename;
        
       
        if (file_exists(IMG_CONTENNT.$size.'_'.$profile_filename)) {
            // YES
            return IMG_CONTENNT.$size.'_'.$profile_filename;
            
        } elseif (file_exists(IMG_CONTENNT.$profile_filename)) {
            // NO
            // @todo Process the images
            $image = new image(IMG_CONTENNT.$profile_filename);

            switch ($size) {
                case 'large':
                    $image->zone_crop(400, 400, 'center');
                    break;
                case 'medium':
                    $image->resize(IMG_WIDTH, NULL);
                    $image->zone_crop(IMG_WIDTH, IMG_WIDTH, 'center');
                    break;
                case 'small':
                    $image->resize(TN_WIDTH, NULL);
                    $image->zone_crop(TN_WIDTH, TN_WIDTH, 'center');
                    break;
                /*
                 default:
                 $image->dynamic_resize(TN_WIDTH,TN_WIDTH);
                 $image->zone_crop(TN_WIDTH,TN_WIDTH,'center');
                 break;
                 */
            }// END Size Process
            
            $image->save(IMG_CONTENNT.$size.'_'.$profile_filename);
            
            $image->close();
            return IMG_CONTENNT.$size.'_'.$profile_filename;
            
        } else {
            return IMG_CONTENNT.'default.jpg';
        } // END if the image exists

        
    } // END Function Get
} // END Class Image Model
?>
 