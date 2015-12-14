/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(window).load(function(){
  var $portfolio_filter_block = $('.view-portfolio-filter-block .field-content a');
  var $portfolio_image = $('.views-field-field-portfolio-image .field-content');
  $portfolio_filter_block.each(function() {    
    $(this).attr('href','#');
    if ($(this).text() == 'All') {
      filter_text = '*';
    }
    else {
      filter_text = '.' + $(this).text().toLowerCase();
    }
    hover_text = $(this).text().toUpperCase();
    $(this).attr('data-filter', filter_text);
    $(this).attr('data-hover', hover_text);
  });
//  Add the filter component to the element in the container
  $('a ',$portfolio_image).each(function() {
    var text = ($(this).attr('href')).split('/')[1];
    text = text.toLowerCase();
    $(this).addClass(text);
  });
  
  $portfolio_image.isotope({
      filter: '*',
      animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false
      }
  });

  $portfolio_filter_block.click(function(){

      $('.active ', $portfolio_filter_block.parents()).removeClass('active');
      $(this).parents().addClass('active');

      var selector = $(this).attr('data-filter');
      $portfolio_image.isotope({
          filter: selector,
          layoutMode : 'masonry',
          animationOptions: {
              duration: 750,
              easing: 'linear',
              queue: false
          }
       });
       return false;
  });
});