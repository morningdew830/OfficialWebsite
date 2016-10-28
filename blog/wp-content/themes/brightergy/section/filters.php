<?php
    $cur_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

    $sel_category = 'Category';
    $search = '';
    $order = isset($_GET['order']) && $_GET['order']? $_GET['order']: 'DESC';
    $orderby = isset($_GET['orderby']) && $_GET['orderby']? $_GET['orderby']: 'date';

    if(is_archive()):
        $term = $wp_query->queried_object;
        $sel_category = $term->name;
        $term_link = get_term_link( $term->slug, $term->taxonomy );
    endif;

    if(is_search()):
        $search = trim($_GET['s']);
    endif;

?>
<section class="section-brg section-brg-learn-list">
    <div class="wrapper-filter-form">
        <div class="container">
            <form class="form filter-form blog-filter">
                <label>Filter by:</label>
                <div class="filter-group">
                    <div class="filter-element-wrapper">
                        <div class="title"><?php echo $sel_category;?></div>
                        <div class="left-btn on"></div>
                        <ul class="filter-dropdown">
                            <li><a href="<?php echo site_url();?>">All</a></li>
                            <?php wp_list_categories('title_li='); ?> 
                        </ul>
                    </div>
                    <div class="filter-element-wrapper">
                        <div class="title"><?php echo ucfirst(strtolower($order));?></div>
                        <div class="left-btn"></div>
                        <ul class="filter-dropdown">
                            <li><a href="<?php echo add_query_arg('order', 'DESC');?>">Desc</a></li>
                            <li><a href="<?php echo add_query_arg('order', 'ASC');?>">Asc</a></li>
                        </ul>
                    </div>
                </div>
                <label>Sort by:</label>
                <div class="sort-box filter-element-wrapper">
                    <div class="title"><?php echo ucfirst(strtolower($orderby));?></div>
                    <div class="left-btn"></div>
                    <ul class="filter-dropdown">
                        <li><a href="<?php echo add_query_arg('orderby', 'date');?>">Date</a></li>
                        <li><a href="<?php echo add_query_arg('orderby', 'title');?>">Title</a></li>
                    </ul>
                </div>
                <div class="wrapper-search">
                    <input type="text" class="form-control search-resources" placeholder="Search resources" name="s" value="<?php echo $search;?>" />
                    <i class="icon icon-search-find"></i>
                </div>
            </form>
            <form class="form filter-form-mobile">
                <div class="row">
                    <div class="col-xs-4 filter-parent-item" id="filter">
                        Filter
                    </div>
                    <div class="col-xs-4 filter-parent-item" id="sort">
                        Sort
                    </div>
                    <div class="col-xs-4 filter-parent-item" id="search">
                        Search
                    </div>
                    <div class="sub-item" id="sub-filter">
                        <ul>
                            <li>
                                <div class="title">Category</div>
                                <div class="comment">
                                    <p><a href="<?php echo site_url();?>">All</a></p>
                                    <?php 
                                        $terms = wp_list_categories('title_li=&echo=0'); 
                                        $terms = str_replace('<li', '<p', $terms);
                                        $terms = str_replace('</li>', '</p>', $terms);
                                        echo $terms;
                                    ?> 
                                </div>
                            </li>
                            <li>
                                <div class="title"><?php echo ucfirst(strtolower($order));?></div>
                                <div class="comment">
                                    <p><a href="<?php echo add_query_arg('order', 'DESC');?>">Desc</a></p>
                                    <p><a href="<?php echo add_query_arg('order', 'ASC');?>">Asc</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="sub-item" id="sub-sort">
                        <ul>
                            <li><div class="title has-no-bg"><a href="<?php echo add_query_arg('orderby', 'date');?>">By Date</a></div></li>
                            <li><div class="title has-no-bg"><a href="<?php echo add_query_arg('orderby', 'title');?>">By Title</a></div></li>
                        </ul>
                    </div>
                    <div class="sub-item" id="sub-search">
                        <div class="wrapper-search">
                            <input type="text" class="form-control search-resources" placeholder="Search resources" name="s" value="<?php echo $search;?>" />
                            <i class="icon icon-search-find"></i>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr/>
</section>