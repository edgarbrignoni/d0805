<?php
class WPUser {
    
    function __construct() {
        add_action('show_user_profile', [$this,'render_user_profile']);
        add_action('edit_user_profile', [$this,'render_user_profile']);
        
        add_action('edit_user_profile_update', [$this,'render_user_profile']);
        add_action('edit_user_profile', [$this,'render_user_profile']);
    }
    
    function render_user_profile() {
        // $query = get_terms('courses');
        $terms = get_terms(['taxonomy'=> 'courses', 'hide_empty'=>false]);
        
        $userCourses = $this->getUserMeta($user->ID, 'user_courses');
        if($userCourses==null) $userCourses=[];
        // if(!$userCourses) $userCourses=[]; same thing as before
        
        echo '<ul>';
        foreach($temrs as $terms) { ?>
            <li>
                <input type="checkbox" name="courses[]" <?php if(in_array($term->term_id, $userCourses)) echo checked="checked" ?> value='<?php echo $term->term_id; ?>'/>
                <?php echo $term->name; ?>
            </li>
        <?php }
        echo '<ul>';
    }
    
    function update_user_profile($user_id) {
        
        if ( current_user_can('edit_user', $user_id) ) {
            
            $this->updateMeta($user_id, 'user_courses', $POST['courses']);
            
        }
    }
    
    function updateMeta($user_id, $meta_key, $value) {
        update_user_meta($id, '123_'.$meta_key, $value);
    }
    
    function getUserMeta($user_id, $meta_key, $value) {
        get_user_meta($id, '123_'.$meta_key, $value);
    }
}