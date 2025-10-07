<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class GVAElement_Posts_Archive_Grid extends GVAElement_Base{
    const NAME = 'gva_posts_archive_grid';
    const TEMPLATE = 'post/posts-archive-grid';
    const CATEGORY = 'welowe_post';

    public function get_categories(){
        return array(self::CATEGORY);
    }
    
    public function get_name(){
        return self::NAME;
    }

    public function get_title() {
        return __('Posts Archive', 'welowe-themer');
    }

    public function get_keywords() {
        return [ 'post', 'content', 'archive', 'search' ];
    }

    public function get_script_depends(){
        return [
            'gavias.elements',
        ];
    }

    public function get_style_depends(){
        return array();
    }

    protected function register_controls(){
        $this->start_controls_section(
            'section_query',
            [
                'label' => __('Layout', 'welowe-themer'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control( // xx Layout
            'layout_heading',
            [
                'label'   => __( 'Layout', 'welowe-themer' ),
                'type'    => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'style',
            [
                'label'     => __('Style', 'welowe-themer'),
                'type'      => Controls_Manager::SELECT,
                'default' => 'post-style-1',
                'options' => [
                    'post-style-1'         => __( 'Item Post Style I', 'welowe-themer' ),
                    'post-style-2'         => __( 'Item Post Style II', 'welowe-themer' ),
                ]
            ]
        );

        $this->add_control(
            'image_size',
            [
               'label'     => __('Image Style', 'welowe-themer'),
               'type'      => Controls_Manager::SELECT,
               'options'   => $this->get_thumbnail_size(),
               'default'   => 'post-thumbnail'
            ]
        );
        $this->add_control(
         'excerpt_words',
         [
            'label'     => __('Excerpt Words', 'welowe-themer'),
            'type'      => 'number',
            'default'   => 12
         ]
        );
        $this->end_controls_section();

        $this->add_control_grid();
      
    }

    protected function render(){
        $settings = $this->get_settings_for_display();
        printf('<div class="gva-element-%s gva-element">', $this->get_name());
        	include $this->get_template(self::TEMPLATE . '.php');
        print '</div>'; 
    }

}

$widgets_manager->register(new GVAElement_Posts_Archive_Grid());
