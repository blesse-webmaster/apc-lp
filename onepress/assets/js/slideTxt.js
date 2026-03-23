/************************************************/
/*	javaScript集 下で呼び出す	*/
/*						*/
/************************************************/
//document.write ( 'slideTxt.js開始' );

/*
	スマホ対応スワイプのトリガー
*/
var swiper = new Swiper('.swiper-container', {
		pagination: '.swiper-pagination',
		parallax: true,
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		paginationClickable: true,
		speed:900,
		autoplay:5000,

});
//document.write ( '完了 slideTxt.js' );

