$(document).ready(function(){
  $('.child-el-wrap').hide();
  $('.item-big-element').click(function(){
    if ( $(this).hasClass( 'selected' ) ) {
      $('.item-big-element').removeClass('selected');
      $('.child-el-wrap').hide('fast');
    } else {
      $('.item-big-element').removeClass('selected');
      $(this).addClass('selected');
      $('.child-el-wrap').hide();
      $(this).find('.child-el-wrap').show('fast');
    }
  })
});
