<?php

namespace Affsquare;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Team_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'aff_team_block';
    }

    public function get_title()
    {
        return esc_html__('Team Block', 'lc');
    }

    public function get_icon()
    {
        return 'eicon-image-box';
    }

    public function get_categories()
    {
        return ['affsquare-category'];
    }

    public function get_keywords()
    {
        return ['team', 'member', 'gameplay'];
    }

    protected function register_controls()
    {
        // Create Query public Settings.
        $this->start_controls_section(
            'team_content',
            [
                'label' => esc_html__('Query Settings', 'affsquare'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'member_column',
            [
                'label' => esc_html__('Column', 'affsquare'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'col-lg-3' => esc_html__('4 Columns', 'affsquare'),
                    'col-lg-4' => esc_html__('3 Columns', 'affsquare'),
                ],
                'default' => 'col-lg-3',
            ]
        );

        $this->add_control(
            'posts_limit',
            [
                'label' => esc_html__('Limit', 'lc'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'step' => 1,
                'default' => 8
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order By', 'lc'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'desc' => esc_html__('DESC', 'lc'),
                    'asc' => esc_html__('ASC', 'lc'),
                ],
                'default' => 'desc'
            ]
        );

        $this->end_controls_section();

        // Create Content Settings.
        $this->start_controls_section(
            'team_container_style',
            [
                'label' => esc_html__('Item Content', 'affsquare'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'team_content_background',
                'label' => esc_html__('Section Label', 'affsquare'),
                'types' => ['classic'],
                'selector' => '{{WRAPPER}} .team-content',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'container_box_shadow',
                'selector' => '{{WRAPPER}} .team-content',
            ]
        );

        $this->add_control(
            'team_margin',
            [
                'label' => esc_html__('Margin', 'affsquare'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .team-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '',
                    'right' => '',
                    'bottom' => '2',
                    'left' => '',
                    'unit' => 'rem',
                    'isLinked' => '',
                ]
            ]
        );

        $this->add_control(
            'team_padding',
            [
                'label' => esc_html__('Padding', 'affsquare'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .team-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'team_border',
                'selector' => '{{WRAPPER}} .team-content',
            ]
        );

        $this->add_control(
            'team_content_radius',
            [
                'label' => esc_html__('Width', 'affsquare'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-content' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Create Image Settings.
        $this->start_controls_section(
         'team_image_style',
             [
               'label' => esc_html__( 'Image', 'affsquare' ),
               'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
             ]
        );
        
        $this->add_control(
            'team_iamge_radius',
            [
                'label' => esc_html__('Width', 'affsquare'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 6
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'selector' => '{{WRAPPER}} .team-content',
            ]
        );
        
        $this->end_controls_section();

        // Create Title Settings.
        $this->start_controls_section(
            'team_item_title_style',
            [
                'label' => esc_html__('Item Title', 'affsquare'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Title Color
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'affsquare'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h5' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Title Font Family
        $this->add_control(
            'title_font_family',
            [
                'label' => esc_html__('Title Font Family', 'affsquare'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => "'PT Sans', sans-serif",
                'selectors' => [
                    '{{WRAPPER}} h5' => 'font-family: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Create Subtitle Settings.
        $this->start_controls_section(
            'team_item_subtitle_style',
            [
                'label' => esc_html__('Item    Subtitle', 'affsquare'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Subtitle Color
        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Subtitle Color', 'affsquare'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Subtitle Font Family
        $this->add_control(
            'subtitle_font_family',
            [
                'label' => esc_html__('Subtitle Font Family', 'affsquare'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => "'PT Sans', sans-serif",
                'selectors' => [
                    '{{WRAPPER}} p' => 'font-family: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include getElementorView('render-team-widget');
    }
}