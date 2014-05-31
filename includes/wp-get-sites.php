if( !function_exists('wp_get_sites') ){
/**
 * Return a list of sites for the current network
 *
 * @since 3.1.0
 *
 * @param array|string $args Optional. Override default arguments.
 * @return array site list and values
 */
function wp_get_sites($args=array()){
// replacement for wp-includes/ms-deprecated.php#get_blog_list
// see wp-admin/ms-sites.php#352
//  also wp-includes/ms-functions.php#get_blogs_of_user
//  also wp-includes/post-template.php#wp_list_pages
	global $wpdb;
	
	$defaults = array(
		'include_id'		=>'',			// includes only these sites in the results, comma-delimited
		'exclude_id'		=>'',			// excludes these sites from the results, comma-delimted
		'blogname_like'		=>'',			// domain or path is like this value
		'ip_like'			=>'',			// Match IP address
		'reg_date_since'	=>'',			// sites registered since (accepts pretty much any valid date like tomorrow, today, 5/12/2009, etc.)
		'reg_date_before'	=>'',			// sites registered before
		'include_user_id'	=>'',			// only sites owned by these users, comma-delimited
		'exclude_user_id'	=>'',			// don't include sites owned by these users, comma-delimited
		'include_spam'		=> false,		// Include sites marked as "spam"
		'include_deleted'	=> false,		// Include deleted sites
		'include_archived'	=> false,		// Include archived sites
		'include_mature'	=> false,		// Included blogs marked as mature
		'public_only'		=> true,		// Include only blogs marked as public
		'sort_column'		=> 'registered',// or registered, last_updated, blogname, site_id.
		'order'				=> 'asc',		// or desc
		'limit_results'		=> '',			// return this many results
		'start'				=> '',			// return results starting with this item
	);
	if( !function_exists('make_email_list_by_user_id')){
		function make_email_list_by_user_id($user_ids){
			$the_users = explode(',',$user_ids);
			$the_emails = array();
			foreach( (array) $the_users as $user_id){
				$the_user = get_userdata($user_id);
				$the_emails[] = $the_user->user_email;
			}
			return $the_emails;
		}
	}
	
	// array_merge
	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );

	$query = "SELECT * FROM {$wpdb->blogs} as b ";
	$query .= "LEFT JOIN {$wpdb->registration_log} as l ON b.`blog_id` = l.`blog_id` ";
	$query .= "WHERE b.`site_id` = '{$wpdb->site_id}' ";

	if ( !empty($include_id) ) {
		$list = implode("','", explode(',', $include_id));
		$query .= " AND b.blog_id IN ('{$list}') ";
	}
	if ( !empty($exclude_id) ) {
		$list = implode("','", explode(',', $exclude_id));
		$query .= " AND b.blog_id NOT IN ('{$list}') ";
	}
	if ( !empty($blogname_like) ) {
		$query .= " AND ( b.domain LIKE '%".$blogname_like."%' OR b.path LIKE '%".$blogname_like."%' ) ";
	}
	if ( !empty($ip_like) ) {
		$query .= " AND l.IP LIKE '%".$ip_like."%' ";
	}
	if( !empty($reg_date_since) ){
		$query .= " AND unix_timestamp(b.date_registered) > '".strtotime($reg_date_since)."' ";
	}
	if( !empty($reg_date_before) ){
		$query .= " AND unix_timestamp(b.date_registered) < '".strtotime($reg_date_before)."' ";
	}
	if ( !empty($include_user_id) ) {
		$the_emails = make_email_list_by_user_id($include_user_id);
		$list = implode("','", $the_emails);
		$query .= " AND l.email IN ('{$list}') ";
	}
	if ( !empty($exclude_user_id) ) {
		$the_emails = make_email_list_by_user_id($include_user_id);
		$list = implode("','", $the_emails);
		$query .= " AND l.email NOT IN ('{$list}') ";
	}
	if ( !empty($ip_like) ) {
		$query .= " AND l.IP LIKE ('%".$ip_like."%') ";
	}
	
	$query .= " AND b.public = ". (($public_only) ? "'1'" : "'0'");
	$query .= " AND b.archived = ". (($include_archived) ? "'1'" : "'0'");
	$query .= " AND b.mature = ". (($include_mature) ? "'1'" : "'0'");
	$query .= " AND b.spam = ". (($include_spam) ? "'1'" : "'0'");
	$query .= " AND b.deleted = ". (($include_deleted) ? "'1'" : "'0'");
	
	if ( $sort_column == 'site_id' ) {
		$query .= ' ORDER BY b.`blog_id` ';
	} elseif ( $sort_column == 'lastupdated' ) {
		$query .= ' ORDER BY b.`last_updated` ';
	} elseif ( $sort_column == 'blogname' ) {
		$query .= ' ORDER BY b.`domain` ';
	} else {
		$sort_column = 'registered';
		$query .= " ORDER BY b.`registered` ";
	}

	$order = ( 'desc' == $order ) ? "DESC" : "ASC";
	$query .= $order;
	
	$limit = '';
	if( !empty($limit_results) ){
		if( !empty($start) ){
			$limit = $start." , ";
		}
		$query .= "LIMIT ".$limit.$limit_results;
	}
	
	$sql = $wpdb->prepare($query);

	$results = $wpdb->get_results($sql, ARRAY_A);
	
	return $results;	
}
}