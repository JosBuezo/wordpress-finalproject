<?php
namespace Rigo\Controller;

use Rigo\Types\Course;
use Rigo\Types\Car;

class SampleController{
    
    public function getHomeData(){
        return [
            'name' => 'Rigoberto'
        ];
    }
    
    public function getDraftCourses(){
        $query = Course::all([ 'status' => 'draft' ]);
        return $query->posts;
    }

    public function getCars(){
	// Define Arguments
	$args = array(
		'post_type' => 'car',
	);

	// Run Query Using get_posts
	$posts = get_posts($args);

	// loop posts and expose acf fields
	foreach ($posts as $key => $post) {
			$posts[$key]->acf = get_fields($post->ID);
	}

	return $posts;
}
}
?>