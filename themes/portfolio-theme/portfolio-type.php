<?php

add_action("admin_init", "portfolio_meta_box");   
 
function portfolio_meta_box(){  
    add_meta_box("projInfo-meta", "Project Options", "portfolio_meta_options", "portfolio", "side", "low");  
}  
   
function portfolio_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $link = $custom["projLink"][0];  
?>  
    <label>Link:</label><input name="projLink" value="<?php echo $link; ?>" />  
<?php  
}

// adding a function to display a short description

add_action("admin_init", "portfolio_shortdesc_box");   
 
function portfolio_shortdesc_box(){  
    add_meta_box("projectDesc-meta", "Project Short Description", "portfolio_shortdesc_options", "portfolio", "normal", "low");  
}  
   
function portfolio_shortdesc_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $desc = $custom["projShortDesc"][0];  
?>  
    <textarea id="myId" rows="10" cols="60" name="projShortDesc" > <?php echo $desc; ?> </textarea>
<?php  
}

add_action('save_post', 'save_project_link'); 
   
function save_project_link(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
        update_post_meta($post->ID, "projLink", $_POST["projLink"]); 
        update_post_meta($post->ID, "projShortDesc", $_POST["projShortDesc"]); 
    }
}

add_filter("manage_edit-portfolio_columns", "project_edit_columns");   

function project_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => "Project",  
            "shortdescription" => "Short Description",
            "description" => "Description",  
            "link" => "Link",  
            "type" => "Type of Project",  
        );  
   
        return $columns;  
}  
 
add_action("manage_posts_custom_column",  "project_custom_columns"); 
   
function project_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
            case "shortdescription":
                $custom = get_post_custom();  
                echo $custom["projShortDesc"][0]; 
                break;
            case "description":  
                the_excerpt();  
                break;  
            case "link":  
                $custom = get_post_custom();  
                echo $custom["projLink"][0];  
                break;  
            case "type":  
                echo get_the_term_list($post->ID, 'project-type', '', ', ','');  
                break;  
        }
}


?>
