<?php
?>

<script type="text/javascript">
    $( document ).ready(function() {
        //for lazy loading on scroll
        $(window).scroll(function () {
            if (!finished && !is_scrolling && $(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
                //For footer loading display
                $(".GridFooter .gridFooterSpinner").addClass('show');
                $(".GridFooter").show();
                is_scrolling = true;
                $.ajax({
                    type: "GET",
                    data: {
                        postType: 'portfolio',
                        category: '',
                        author: '',
                        taxonomy: '',
                        tag: '',
                        search: '',
                        postNotIn: '',
                        numPosts: post_per_page,
                        pageNumber: page,
                        offset: '',
                        template:'page-portfolio'
                    },
                    dataType: "html", // parse the data as html
                    url: "<?php echo get_template_directory_uri(); ?>/library/ajax-load-more/ajax-load-more.php",
                    beforeSend: function () {

                    },
                    success: function (data) {
                        $data = $(data); // Convert data to an object
                        if ($data.length > 0) {

                            $container.isotope('insert',$data);
                            $container.imagesLoaded( function(){
                                $isotope_container = $container.isotope({
                                    itemSelector : '.element',
                                    layoutMode: 'sloppyMasonry',
                                    masonry : {
                                    }
                                });
                            });

                            //$isotope_container.isotope('layout');
                            if ($data.length < post_per_page) {
                                finished = true;

                                //For footer loading display
                                $(".GridFooter .gridFooterSpinner").removeClass('show');
                                $(".GridFooter").hide();
                                $(".no-more-bar").html('No more portfolios.');
                                $(".no-more-bar").show();
                            }
                            else
                            {
                                page = page + 1;
                                is_scrolling = false;
                            }
                            $container.isotope('reloadItems');
                        }
                        else{
                            finished = true;
                            //For footer loading display
                            $(".GridFooter .gridFooterSpinner").removeClass('show');
                            $(".GridFooter").hide();
                            $(".no-more-bar").html('No more portfolios.');
                            $(".no-more-bar").show();
                        }
                        $container.isotope('reLayout');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    }
                });
            }
        });
    });
</script>