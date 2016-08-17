$('.order .see').on('click', function(){
	$(this).parent().parent().next().next().next().toggle().siblings('.wuliu').hide();
});
$searchBox = $(".search-con");
$searchBox.focus(function(){
	$(this).addClass('focus');
	if($(this).val() == this.defaultValue){
		this.value = "";
	}
}).blur(function(){
	$(this).removeClass('focus').val(this.value == ""?this.defaultValue:this.value);
});